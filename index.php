<?php
include_once 'classes/BroodjesSysteem.php';

$broodjesSysteem = new BroodjesSysteem();
$broodjes = $broodjesSysteem->getBroodjesLijst();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BroodjesZaak</title>
    <link rel="stylesheet" href="css/main.css">
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
        <section id="broodjes-collection">
            <?php
            foreach ($broodjes as $broodje) {
            ?>
                <form action="bestellingForm.php" method="post">
                    <input type="hidden" name="broodjeID" value="<?= $broodje->getId() ?>" />
                    <div id="broodjes-div">
                        <img class="broodje-img" src="img/broodjes/<?= $broodje->getFoto() ?>" />
                        <p id="brood-title"><?php echo $broodje->getNaam() ?></p>
                        <p><?php echo $broodje->getOmschrijving() ?></p>
                        <p><?php echo $broodje->getPrijs() ?>€</p>
                    </div>
                    <input type="submit" value="Bestellen">
                </form>
            <?php
            }
            ?>
            </form>
        </section>
    </main>
</body>

</html>