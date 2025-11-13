<?php
include_once 'classes/Broodje.php';
include_once 'classes/DBConfig.php';
class BroodjesSysteem
{
    private string $dbConn = "";
    private string $dbUsername = "";
    private string $dbPassword = "";
    public function __construct() {}
    public function getBroodjesLijst(): ?array
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
        $sql = "select id, naam, omschrijving, prijs, foto from broodjes";
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $broodje = new Broodje((int)$rij["id"], $rij["naam"], $rij["omschrijving"], (float)$rij["prijs"], $rij["foto"]);
            array_push($lijst, $broodje);
        }
        $dbh = null;
        return $lijst;
    }
    public function getBroodById(int $id): ?Broodje
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
        $sql = "select naam, omschrijving, prijs, foto from broodjes where id = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(":id" => $id));
        $resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
        $broodje = new Broodje($id, $resultSet["naam"], $resultSet["omschrijving"], (float)$resultSet["prijs"], $resultSet["foto"]);
        $dbh = null;
        return $broodje;
    }
}
