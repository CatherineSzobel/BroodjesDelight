<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Business\ClientManager;
use App\Business\OrderManager;
use App\Business\SandwichManager;
use App\Service\ClientService;
use App\Service\OrderService;
use App\Controller\OrderController;
use App\Service\SandwichService;

// Instantiate dependencies
$sandwichService = new SandwichService();
$sandwichManager = new SandwichManager($sandwichService);
$clientManager = new ClientManager(new ClientService());
$orderManager = new OrderManager(new OrderService());
$controller = new OrderController($sandwichManager, $clientManager, $orderManager);

$sandwiches = $sandwichManager->getAllSandwiches();
// Initialize response
$response = [
    'orderText' => '',
    'orderId' => null,
    'orderTextVisibility' => false,
    'orderErrorTextVisibility' => false,
    'orderAlBesteld' => false,
    'firstname' => '',
    'lastname' => '',
    'email' => '',
    'street' => '',
    'housenumber' => '',
    'postalcode' => '',
    'city' => '',
    'sandwich' => null
];


// Get sandwich if sandwich_id is provided
$sandwichId = (int)($_POST['sandwich_id'] ?? 0);
if ($sandwichId > 0) {
    $sandwich = $sandwichManager->getSandwichById($sandwichId);
    if ($sandwich !== null) {
        $response['sandwich'] = $sandwich;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $response = $controller->placeOrder($_POST);
}

$step = (int)($_POST['step'] ?? 1);
if ($step < 1) $step = 1;
if ($step > 3) $step = 3;
if ($response['orderId'] && !$response['orderAlBesteld']) {
    $step = 3;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require __DIR__ . '/../src/Views/bestellingForm.php';
} else {
    header('Location: index.php');
    exit;
}
