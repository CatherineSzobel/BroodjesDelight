<?php

declare(strict_types=1);

namespace App\Controller;

use App\Business\SandwichManager;
use App\Business\ClientManager;
use App\Business\OrderManager;

class OrderController
{
    private SandwichManager $sandwichManager;
    private ClientManager $clientManager;
    private OrderManager $orderManager;

    public function __construct(
        SandwichManager $sandwichManager,
        ClientManager $clientManager,
        OrderManager $orderManager
    ) {
        $this->sandwichManager = $sandwichManager;
        $this->clientManager   = $clientManager;
        $this->orderManager    = $orderManager;
    }

    public function placeOrder(array $data): array
    {
        $response = [
            'sandwich' => null,
            'firstname' => $data['firstname'] ?? '',
            'lastname' => $data['lastname'] ?? '',
            'email' => $data['email'] ?? '',
            'street' => $data['street'] ?? '',
            'housenumber' => $data['housenumber'] ?? '',
            'postalcode' => $data['postalcode'] ?? '',
            'city' => $data['city'] ?? '',
            'step' => (int)($data['step'] ?? 1),

            'orderId' => null,
            'orderAlBesteld' => false,
            'orderText' => '',
            'orderTextVisibility' => false,
            'orderErrorTextVisibility' => false,
            'success' => false,
            'message' => ''
        ];

        // --- Step 1: Validate & sanitize inputs ---
        $response['firstname'] = preg_replace('/[^\p{L}\s\-]/u', '', trim($data['firstname'] ?? ''));
        $response['lastname'] = preg_replace('/[^\p{L}\s\-]/u', '', trim($data['lastname'] ?? ''));
        $response['email'] = filter_var($data['email'] ?? '', FILTER_VALIDATE_EMAIL) ?: '';
        $response['street'] = htmlspecialchars(trim($data['street'] ?? ''), ENT_QUOTES | ENT_HTML5);
        $response['housenumber'] = preg_replace('/[^0-9a-zA-Z]/', '', trim($data['housenumber'] ?? ''));
        $response['postalcode'] = preg_replace('/[^0-9A-Z]/i', '', trim($data['postalcode'] ?? ''));
        $response['city'] = htmlspecialchars(trim($data['city'] ?? ''), ENT_QUOTES | ENT_HTML5);

        // Step validation (must be 1, 2, or 3)
        $step = filter_var($data['step'] ?? 1, FILTER_VALIDATE_INT);
        $response['step'] = in_array($step, [1, 2, 3], true) ? $step : 1;


        $sandwichId = filter_var($data['sandwich_id'] ?? null, FILTER_VALIDATE_INT);
        // Fetch sandwich only if provided
        if ($sandwichId !== false && $sandwichId > 0) {
            $sandwich = $this->sandwichManager->getSandwichById((int)$data['sandwich_id']);
            if ($sandwich === null) {
                $response['message'] = 'Invalid sandwich selected';
                return $response;
            }

            $response['sandwich'] = $sandwich;
        }

        // Only place order on step 3
        if ($response['step'] === 3 && $response['sandwich']) {

            if (empty($response['firstname']) || empty($response['lastname']) || empty($response['email'])) {
                $response['message'] = 'Please provide valid personal information.';
                $response['orderErrorTextVisibility'] = true;
                return $response;
            }

            $client = $this->clientManager->getClient(
                $response['firstname'],
                $response['lastname'],
                $response['email']
            );

            $orderId = $this->orderManager->PlaceNewOrder(
                $sandwich->getId(),
                $client->getClientId()
            );

            $response['orderId'] = $orderId;
            $response['orderText'] = 'Order placed';
            $response['orderTextVisibility'] = true;
            $response['success'] = true;
            $response['message'] = 'Order successfully placed';
        }

        return $response;
    }
}
