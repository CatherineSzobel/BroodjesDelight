<?php

namespace App\Service;

use App\Model\Client;
use PDO;
use PDOException;
use App\Core\DBConfig;

class ClientService
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

    public function getClientsList(): array
    {

        $sql = "SELECT id,first_name,last_name,email FROM clients";
        $stmt = $this->dbh->query($sql);

        $list = [];
        foreach ($stmt as $rij) {
            $list[] = new Client(
                (int)$rij['id'],
                $rij['first_name'],
                $rij['last_name'],
                $rij['email']
            );
        }
        return $list;
    }

    public function getClient($firstname, $lastname, $email): ?Client
    {

        $sql = "SELECT id FROM clients WHERE first_name = :first_name AND last_name = :last_name AND email = :email";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([
            ':first_name' => $firstname,
            ':last_name' => $lastname,
            ':email' => $email
        ]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($result) {
            $clientId = (int)$result['id'];
        } else {
            $insertSql = "insert into clients (first_name, last_name, email) values (:first_name, :last_name, :email)";
            $insertStmt = $this->dbh->prepare($insertSql);
            $insertStmt->execute([
                ':first_name' => $firstname,
                ':last_name' => $lastname,
                ':email' => $email
            ]);

            $clientId = (int)$this->dbh->lastInsertId();
        }

        return new Client($clientId, $firstname, $lastname, $email);
    }

    public function getClientById(int $id): ?Client
    {

        $sql = "SELECT id, first_name, last_name, email FROM clients WHERE id = :id";

        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Client(
            (int)$row['id'],
            $row['first_name'],
            $row['last_name'],
            $row['email']
        );
    }
}
