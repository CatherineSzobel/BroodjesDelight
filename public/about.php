<?php

declare(strict_types=1);

// 1. Load Composer autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// 3. Handle requests (very simple routing)
$view = 'about';  // default view
$response = [];

// 4. Load the appropriate view
require __DIR__ . '/../src/Views/' . $view . '.php';
