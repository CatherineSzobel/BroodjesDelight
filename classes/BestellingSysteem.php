<?php
include_once 'classes/Bestelling.php';
include_once 'classes/DBConfig.php';
class BestellingSysteem
{
    public function getBestellingenLijst(): array
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
        $sql = "select bestelID, broodjeID, klantID, afhalingsmoment, statusID from bestellingen";
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $bestelling = new Bestelling($rij["bestelID"], $rij["broodjeID"], $rij["klantID"], new DateTime($rij["afhalingsmoment"]), $rij["statusID"]);
            array_push($lijst, $bestelling);
        }
        $dbh = null;
        return $lijst;
    }
    public function isAlBesteldDoorKlant(string $klantEmail): bool
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
            return false;
        }
        $sql = "select count(bestelID) from bestellingen where klantID in (select klantID from klanten where email = :email)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(":email" => $klantEmail));
        $resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
        $dbh = null;
        return $resultSet["count(bestelID)"] > 0;
    }
    public function voegBestellingToe(int $broodjeID, int $klantID, DateTime $afhalingsmoment): int
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
            return 0;
        }

        $sql = "insert into bestellingen (broodjeID, klantID, afhalingsmoment, statusID) values (:broodjeID, :klantID, :afhalingsmoment, :statusID)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([
            ':broodjeID' => $broodjeID,
            ':klantID' => $klantID,
            ':afhalingsmoment' => $afhalingsmoment->format('Y-m-d H:i:s'),
            ':statusID' => 1
        ]);
        $bestellingID = (int)$dbh->lastInsertId();
        $dbh = null;
        return $bestellingID;
    }
    public function updateStatus(int $bestellingID, int $statusID): void
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
            return;
        }
        $sql = "update bestellingen set statusID = :statusID where bestelID = :bestelID";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(":statusID" => $statusID, ":bestelID" => $bestellingID));
        $dbh = null;
    }
    public function getUpdateStatusNaam(int $statusID): string
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
            return "";
        }
        $sql = "select status from statussen where statusID = :statusID";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(":statusID" => $statusID));
        $resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
        $dbh = null;
        return $resultSet["status"];
    }
}
