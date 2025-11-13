<?php
include_once 'classes/BestellingSysteem.php';
include_once 'classes/KlantenSysteem.php';
include_once 'classes/BroodjesSysteem.php';

$bestellingSysteem = new BestellingSysteem();

if (isset($_GET["action"]) && $_GET["action"] == "gemaakt") {
    $bestellingId = (int)$_POST["id"];
    $bestellingSysteem->updateStatus($bestellingId, 2);
} else if (isset($_GET["action"]) && $_GET["action"] == "afgehaald") {
    $bestellingId = (int)$_POST["id"];
    $bestellingSysteem->updateStatus($bestellingId, 3);
}


$Bestellingen = $bestellingSysteem->getBestellingenLijst();

$klantenSysteem = new KlantenSysteem();
$klantenLijst = $klantenSysteem->getKlantenLijst();

$broodjesSysteem = new BroodjesSysteem();
$broodjesLijst = $broodjesSysteem->getBroodjesLijst();

$count = 0;
$status = function (array $bestellingen, int $status, int $count): int {
    foreach ($bestellingen as $bestelling) {

        if ($bestelling->getStatus() == $status) {

            $count += 1;
        }
    }
    return $count;
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BroodjesZaak</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/overzicht.css">
</head>

<body>
    <header>
        <nav>
            <a href="main.php"><img id="logo" src="img/logo.png" /></a>
        </nav>
    </header>
    <main>
        <div>
            <?php if ($status($Bestellingen, 1, $count) > 0) { ?>

                <section class="overzicht besteld">
                    <table>
                        <thead>
                            <tr>
                                <th>Klant naam</th>
                                <th>Klant email</th>
                                <th>Broodje naam</th>
                                <th>Tijdstip</th>
                                <th>Status</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            foreach ($Bestellingen as $bestelling) { ?>
                                <?php if ($bestelling->getStatus() == 1) { ?>
                                    <tr>
                                        <?php
                                        $klant = $klantenSysteem->getKlantById($bestelling->getKlantID());
                                        $broodje = $broodjesSysteem->getBroodById($bestelling->getBroodjeID());
                                        ?>
                                        <td><?= $klant->getFullName() ?></td>
                                        <td><?= $klant->getEmail() ?></td>
                                        <td><?= $broodje->getNaam() ?></td>
                                        <td><?= $bestelling->getAfhalingsmoment()->format('Y-m-d H:i:s') ?></td>
                                        <td id="besteld"><?= $bestellingSysteem->getUpdateStatusNaam($bestelling->getStatus()) ?></td>
                                        <form action="overzicht.php?action=gemaakt" method="post">
                                            <input type=hidden name="id" value="<?= $bestelling->getBestelID() ?>">
                                            <td><input type="submit" value="Gemaakt"></td>
                                        </form>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </section>
            <?php  } ?>
            <?php if ($status($Bestellingen, 2, $count) > 0) { ?>
                <section class="overzicht gemaakt">
                    <table>
                        <thead>
                            <tr>
                                <th>Klant naam</th>
                                <th>Klant email</th>
                                <th>Broodje naam</th>
                                <th>Tijdstip</th>
                                <th>Status</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            foreach ($Bestellingen as $bestelling) { ?>
                                <?php if ($bestelling->getStatus() == 2) { ?>
                                    <tr>
                                        <?php
                                        $klant = $klantenSysteem->getKlantById($bestelling->getKlantID());
                                        $broodje = $broodjesSysteem->getBroodById($bestelling->getBroodjeID());
                                        ?>
                                        <td><?= $klant->getFullName() ?></td>
                                        <td><?= $klant->getEmail() ?></td>
                                        <td><?= $broodje->getNaam() ?></td>
                                        <td><?= $bestelling->getAfhalingsmoment()->format('Y-m-d H:i:s') ?></td>
                                        <td id="gemaakt"><?= $bestellingSysteem->getUpdateStatusNaam($bestelling->getStatus()) ?></td>
                                        <form action="overzicht.php?action=afgehaald" method="post">
                                            <input type=hidden name="id" value="<?= $bestelling->getBestelID() ?>">
                                            <td><input type="submit" value="Afgehaald"></td>
                                        </form>

                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </section>
            <?php } ?>
            <?php if ($status($Bestellingen, 1, $count) == 0 && $status($Bestellingen, 2, $count) == 0) { ?>
                <section class="overzicht">
                    <h1>Er zijn momenteel geen bestellingen</h1>
                </section>
            <?php } ?>
        </div>
    </main>
</body>

</html>