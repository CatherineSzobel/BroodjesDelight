<?php
include_once 'classes/BroodjesSysteem.php';
include_once 'classes/KlantenSysteem.php';
include_once 'classes/Bestelling.php';
include_once 'classes/BestellingSysteem.php';

$broodjesSysteem = new BroodjesSysteem();
$broodje = $broodjesSysteem->getBroodById($_POST["broodjeID"]);
$klantenSysteem = new KlantenSysteem();
$klantLijst = $klantenSysteem->getKlantenLijst();
$bestellingSysteem = new BestellingSysteem();
$bestellingLijst = $bestellingSysteem->getBestellingenLijst();
$bestellingText = "";
$bestellingTextVisibility = false;
$bestellingErrorTextVisibility = false;
$bestellingAlBesteld = false;

$voornaam = isset($_POST["voornaam"]) ? $_POST["voornaam"] : "";
$achternaam = isset($_POST["achternaam"]) ? $_POST["achternaam"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$afhalingsmoment = isset($_POST["afhalingsmoment"]) ? $_POST["afhalingsmoment"] : "";
$bestellingId = 0;

if (isset($_POST["afhalingsmoment"])) {
    $nu = time();
    $date = new DateTime($_POST["afhalingsmoment"]);
    $afhaaltijd = $date->getTimestamp();
    if (($afhaaltijd - $nu) < 1800) {
        $bestellingErrorTextVisibility = true;
    } else if (isset($_POST["voornaam"], $_POST["achternaam"], $_POST["email"], $_POST["afhalingsmoment"])) {
        $bestellingErrorTextVisibility = false;
        $bestellingTextVisibility = true;
        $klantID = $klantenSysteem->getKlant($voornaam, $achternaam, $email);
        if ($klantID != null) {
            if ($bestellingSysteem->isAlBesteldDoorKlant($klantID->getEmail())) {
                $bestellingText = "Klant heeft al besteld";
                $bestellingAlBesteld = true;
            } else {
                $bestellingId = $bestellingSysteem->voegBestellingToe($broodje->getId(), $klantID->getKlantID(), new DateTime($afhalingsmoment));
                $bestellingText = "Bestelling geplaatst";
                $bestellingAlBesteld = false;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BroodjesZaak</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bestelling.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baskervville:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav>
            <a href="main.php"><img id="logo" src="img/logo.png" /></a>
        </nav>
    </header>
    <main>
        <div id="collection">

            <div class="personalInfo border">
                <form action="bestellingForm.php?action=besteld" method="post">
                    <input type="hidden" name="broodjeID" value="<?= $broodje->getId() ?>" />
                    <div id="icon">
                        <img src="img/persoon.png" />
                    </div>
                    <h1>Persoonlijke informatie</h1>
                    <label>Voornaam:</label>
                    <input type="text" name="voornaam" placeholder="voornaam" required value="<?php echo $voornaam ?>">
                    <label>Achternaam: </label>
                    <input type="text" name="achternaam" placeholder="achternaam" value="<?php echo $achternaam ?>" required>
                    <label>Email: </label>
                    <input type="email" name="email" placeholder="Email" required value="<?php echo $email ?>">
                    <label>AfhalingTijd <p class="error" <?php if ($bestellingErrorTextVisibility) echo "visible";
                                                            else echo "hidden"; ?>>Het bestelling moet minimaal 30 minuten in de toekomst zijn</p></label>
                    <input type="datetime-local" name="afhalingsmoment" required value="<?php echo $afhalingsmoment ?>">
                    <input type="submit" value="Bestelling afronden">
                </form>
            </div>

            <div class="bestelling border">
                <div id="icon">
                    <img src="img/broodjeicon.png" />
                </div>
                <h1>Uw Bestelling</h1>
                <div id="content">
                    <p id="brood-title"><?php echo $broodje->getNaam() ?></p>
                    <p>Omschrijving: <?php echo $broodje->getOmschrijving() ?></p>
                    <p>Prijs: <?php echo $broodje->getPrijs() ?> euro</p>
                    <h1 class="systeemInfo <?php if ($bestellingAlBesteld) echo "error";
                                            else echo ""; ?>"
                        <?php if (!$bestellingTextVisibility) echo "hidden";
                        else echo "visible"; ?>>
                        <?php echo $bestellingText ?>
                    </h1>
                    <?php if (!$bestellingAlBesteld) { ?>
                        <h2>
                            Uw bestellingnummer: <?php echo $bestellingId ?>
                        </h2>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
</body>

</html>