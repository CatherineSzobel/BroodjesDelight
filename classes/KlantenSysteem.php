<?php
include_once 'classes/Klant.php';
class KlantenSysteem
{


    public function getKlantenLijst(): array
    {
        try {
            $dbh = new PDO(
                DBConfig::$DB_CONNSTRING,
                DBConfig::$DB_USERNAME,
                DBConfig::$DB_PASSWORD
            );
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return array();
        }

        $sql = "select klantID,voornaam,achternaam,email from klanten";
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $klant = new Klant($rij["klantID"], $rij["voornaam"], $rij["achternaam"], $rij["email"]);
            array_push($lijst, $klant);
        }
        $dbh = null;
        return $lijst;
    }
    public function getKlant($voornaam, $achternaam, $email): ?Klant
    {
        try {
            $dbh = new PDO(
                DBConfig::$DB_CONNSTRING,
                DBConfig::$DB_USERNAME,
                DBConfig::$DB_PASSWORD
            );
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }

        $sql = "select klantID from klanten where voornaam = :voornaam and achternaam = :achternaam and email = :email";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([
            ':voornaam' => $voornaam,
            ':achternaam' => $achternaam,
            ':email' => $email
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $klantID = (int)$result['klantID'];
        } else {
            $insertSql = "insert into klanten (voornaam, achternaam, email) values (:voornaam, :achternaam, :email)";
            $insertStmt = $dbh->prepare($insertSql);
            $insertStmt->execute([
                ':voornaam' => $voornaam,
                ':achternaam' => $achternaam,
                ':email' => $email
            ]);

            $klantID = (int)$dbh->lastInsertId();
        }

        $dbh = null;

        return new Klant($klantID, $voornaam, $achternaam, $email);
    }
    public function getKlantById(int $klantID): ?Klant
    {
        try {
            $dbh = new PDO(
                DBConfig::$DB_CONNSTRING,
                DBConfig::$DB_USERNAME,
                DBConfig::$DB_PASSWORD
            );
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
        $sql = "select klantID,voornaam,achternaam,email from klanten where klantID = :klantID";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(":klantID" => $klantID));
        $resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
        $dbh = null;
        return new Klant($resultSet["klantID"], $resultSet["voornaam"], $resultSet["achternaam"], $resultSet["email"]);
    }
}
