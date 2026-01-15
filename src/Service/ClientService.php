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

}
