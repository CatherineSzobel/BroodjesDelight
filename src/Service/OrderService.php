<?php


namespace App\Service;

use App\Model\Order;
use DateTime;
use PDO;
use PDOException;
use App\Core\DBConfig;

class OrderService
{
    private PDO $dbh;

    public function __construct()
    {
        $dbConfig = new DBConfig();
        try {
            $this->dbh = new PDO(
                $dbConfig->connString,
                $dbConfig->username,
                $dbConfig->password
            );
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw $e;
        }
    }


    public function getAllOrders(): array
    {

        $sql = "SELECT order_id, sandwich_id, client_id, ordered_at, status_id FROM orders";
        $stmt = $this->dbh->query($sql);

        $list = [];
        foreach ($stmt as $row) {
            $list[] = new Order(
                $row["order_id"],
                $row["sandwich_id"],
                $row["client_id"],
                new DateTime($row["ordered_at"]),
                $row["status_id"]
            );
        }
        return $list;
    }
    public function AddOrder(int $sandwich_id, int $client_id): int
    {

        $sql = "INSERT INTO orders (sandwich_id, client_id, ordered_at, status_id) 
                VALUES (:sandwich_id, :client_id, :ordered_at, :status_id)";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([
            ':sandwich_id' => $sandwich_id,
            ':client_id' => $client_id,
            ':ordered_at' => (new DateTime())->format('Y-m-d H:i:s'),
            ':status_id' => Order::STATUS_PENDING
        ]);

        return (int)$this->dbh->lastInsertId();
    }
    public function updateStatus(int $order_id, int $status_id): void
    {
        $sql = "UPDATE orders SET status_id = :status_id WHERE order_id = :order_id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([
            ':status_id' => $status_id,
            ':order_id' => $order_id
        ]);
    }
}
