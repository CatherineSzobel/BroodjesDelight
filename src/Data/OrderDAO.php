<?php


namespace App\Data;

use App\Model\Order;
use DateTime;
use PDO;
use App\Core\Database;

class OrderDAO
{
    private PDO $dbh;

    public function __construct()
    {
        $this->dbh = Database::getConnection();
    }


    public function getAllOrders(): array
    {

        $sql = "SELECT order_id, sandwich_id, client_id, ordered_at FROM orders";
        $stmt = $this->dbh->query($sql);

        $list = [];
        foreach ($stmt as $row) {
            $list[] = new Order(
                $row["order_id"],
                $row["sandwich_id"],
                $row["client_id"],
                new DateTime($row["ordered_at"])
            );
        }
        return $list;
    }
    public function AddOrder(int $sandwich_id, int $client_id): int
    {

        $sql = "INSERT INTO orders (sandwich_id, client_id, ordered_at) 
                VALUES (:sandwich_id, :client_id, :ordered_at)";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([
            ':sandwich_id' => $sandwich_id,
            ':client_id' => $client_id,
            ':ordered_at' => (new DateTime())->format('Y-m-d H:i:s'),
        ]);

        return (int)$this->dbh->lastInsertId();
    }
}
