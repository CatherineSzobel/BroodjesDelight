<?php
declare(strict_types=1);

namespace App\Service;

use App\Data\OrderDAO;

class OrderService
{

    public function __construct(private OrderDAO $service)
    {}

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
