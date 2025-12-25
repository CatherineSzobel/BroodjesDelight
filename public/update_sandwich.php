<?php

use App\Business\SandwichManager;
use App\Service\SandwichService;

session_start();
$sandwichService = new SandwichService();
$sandwichManager = new SandwichManager($sandwichService);
$sandwiches = $sandwichManager->getAllSandwiches();

$selectedId = $_POST['sandwich_id'] ?? null;

foreach ($sandwiches as $sandwich) {
    if ($sandwich->getId() == $selectedId) {
        $_SESSION['selected_sandwich'] = $sandwich;
        exit;
    }
}

echo json_encode(['error' => 'Sandwich not found']);
