<?php

namespace App\Data;

use PDO;
use App\Core\Database;
use App\Model\Sandwich;

class SandwichDAO
{
    private PDO $dbh;
    public function __construct()
    {
        $this->dbh = Database::getConnection();
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

    public function getFeaturedSandwiches(): ?array
    {
        $sql = "SELECT id, name, description, price, picture FROM sandwiches 
        WHERE featured = 1";
        $stmt  = $this->dbh->query($sql);

        $featuredList = [];
        foreach ($stmt as $row) {
            $featuredList[] = new Sandwich(
                (int)$row['id'],
                $row['name'],
                $row['description'],
                (float)$row['price'],
                $row['picture']
            );
        }

        return $featuredList;
    }
}
