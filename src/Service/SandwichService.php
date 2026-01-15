<?php

namespace App\Service;

use PDO;
use PDOException;
use App\Core\DBConfig;
use App\Model\Sandwich;

class SandwichService
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

    public function getSandwichList(): ?array
    {

        $sql = "SELECT id, name, description, price, picture FROM sandwiches";
        $stmt  = $this->dbh->query($sql);

        $lijst = [];
        foreach ($stmt as $rij) {
            $lijst[] = new Sandwich(
                (int)$rij['id'],
                $rij['name'],
                $rij['description'],
                (float)$rij['price'],
                $rij['picture']
            );
        }

        return $lijst;
    }

    public function getFeaturedSandwiches(): ?array
    {

        $sql = "SELECT id, name, description, price, picture FROM sandwiches WHERE featured = 1";
        $stmt  = $this->dbh->query($sql);

        $lijst = [];
        foreach ($stmt as $rij) {
            $lijst[] = new Sandwich(
                (int)$rij['id'],
                $rij['name'],
                $rij['description'],
                (float)$rij['price'],
                $rij['picture']
            );
        }

        return $lijst;
    }
    public function getSandwichById(int $id): ?Sandwich
    {

        $sql = "SELECT name, description, price, picture FROM sandwiches WHERE id = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([':id' => $id]);
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$rij) {
            return null;
        }

        return new Sandwich(
            $id,
            $rij['name'],
            $rij['description'],
            (float)$rij['price'],
            $rij['picture']
        );
    }
}
