<?php

declare(strict_types=1);

namespace App\Business;

use App\Model\Client;
use App\Service\ClientService;

class ClientManager
{
    private ClientService $service;

    public function __construct(ClientService $service)
    {
        $this->service = $service;
    }

    public function getClient(string $firstname, string $lastname, string $email): Client
    {
        return $this->service->getClient($firstname, $lastname, $email);
    }

}
