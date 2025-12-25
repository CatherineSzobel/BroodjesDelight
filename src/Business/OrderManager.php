<?php
declare(strict_types=1);

namespace App\Business;

use App\Service\OrderService;
use DateTime;

class OrderManager
{
    private OrderService $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    public function PlaceNewOrder(int $sandwichId, int $clientId): ?int
    {

        return $this->service->AddOrder($sandwichId, $clientId);
    }

    public function getAllOrders(): array
    {
        return $this->service->getAllOrders();
    }

    public function updateOrderStatus(int $bestelID, int $statusID): void
    {
        $this->service->updateStatus($bestelID, $statusID);
    }

    public function getStatusName(int $statusID): string
    {
        return $this->service->getStatusName($statusID);
    }
}
