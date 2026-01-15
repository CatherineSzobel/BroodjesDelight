<?php

declare(strict_types=1);

namespace App\Business;

use App\Model\Sandwich;
use App\Service\SandwichService;

class SandwichManager
{
    private SandwichService $service;

    public function __construct(SandwichService $service)
    {
        $this->service = $service;
    }

    public function getAllSandwiches(): array
    {
        return $this->service->getSandwichList();
    }

    public function getFeaturedSandwiches(): array
    {
        return $this->service->getFeaturedSandwiches();
    }
    public function getSandwichById(int $id): ?Sandwich
    {
        return $this->service->getSandwichById($id);
    }
}
