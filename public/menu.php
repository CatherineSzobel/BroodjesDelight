<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Service\SandwichService;

use App\Business\SandwichManager;

$sandwichService = new SandwichService();
$sandwichManager = new SandwichManager($sandwichService);
$broodjes = $sandwichManager->getAllSandwiches();

$view = 'menu'; 
$response = [];

require __DIR__ . '/../src/Views/' . $view . '.php';
