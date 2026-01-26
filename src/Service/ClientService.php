<?php

declare(strict_types=1);

namespace App\Service;

use App\Model\Client;
use App\Data\ClientDAO;

class ClientService
{

    public function __construct(private ClientDAO $service)
    {
    }

    /**
     * Get all customers
     */
    public function getAllClients(): array
    {
        return $this->service->getClientsList();
    }

    /**
     * Get or create a customer
     */
    public function getClient(string $firstname, string $lastname, string $email): Client
    {
        return $this->service->getClient($firstname, $lastname, $email);
    }

    /**
     * Get customer by ID
     */
    public function getClientById(int $clientId): ?Client
    {
        return $this->service->getClientById($clientId);
    }
}
