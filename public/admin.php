<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Service\SandwichService;
use App\Service\ClientService;
use App\Service\OrderService;
use App\Business\OrderManager;
use App\Business\SandwichManager;
use App\Business\ClientManager;
use App\Model\Order;

// Services & managers
$orderManager   = new OrderManager(new OrderService());
$clientManager   = new ClientManager(new ClientService());
$sandwichManager = new SandwichManager(new SandwichService());

// Handle status updates
if (isset($_POST['action'], $_POST['id'])) {
    $orderId = (int) $_POST['id'];
    $action = $_POST['action'];

    if ($action === 'Done') {
        $orderManager->updateOrderStatus($orderId, Order::STATUS_ORDERED);
    }

    if ($action === 'Collected') {
        $orderManager->updateOrderStatus($orderId, Order::STATUS_DONE);
    }

    header('Location: admin.php');
    exit;
}


// Fetch orders
$orders = $orderManager->getAllOrders();

// Helper: filter orders by status
function filterByStatus(array $orders, int $status): array
{
    return array_filter($orders, fn($o) => $o->getStatus() === $status);
}

$ordered  = filterByStatus($orders, 1);
$gemaakt  = filterByStatus($orders, 2);

require __DIR__ . '/../src/Views/overzicht.php';
