<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Service\SandwichService;

$sandwichService = new SandwichService();
$broodjes = $sandwichService->getSandwichList();

$view = 'index'; 
$response = [];

require __DIR__ . '/../src/Views/' . $view . '.php';
