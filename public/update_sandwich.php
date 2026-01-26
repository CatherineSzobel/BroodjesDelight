<?php

use App\Data\SandwichDAO;
use App\Service\SandwichService;

session_start();
$sandwichService = new SandwichService(new SandwichDAO());
$sandwiches = $sandwichService->getAllSandwiches();

$selectedId = $_POST['sandwich_id'] ?? null;

foreach ($sandwiches as $sandwich) {
    if ($sandwich->getId() == $selectedId) {
        $_SESSION['selected_sandwich'] = $sandwich;
        exit;
    }
}

echo json_encode(['error' => 'Sandwich not found']);
