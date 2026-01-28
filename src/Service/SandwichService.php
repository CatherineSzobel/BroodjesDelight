<?php

declare(strict_types=1);

namespace App\Service;

use App\Data\SandwichDAO;
use App\Model\Sandwich;

class SandwichService
{

    public function __construct(private SandwichDAO $service)
    {}

    /**
     * Get all sandwiches
     */
    public function getAllSandwiches(): array
    {
        return $this->service->getSandwichList();
    }

    /**
     * Get a sandwich by ID, return null if not found
     */
    public function getSandwichById(int $id): ?Sandwich
    {
        return $this->service->getSandwichById($id);
    }

    /**
     * Get featured sandwiches
     */
    public function getFeaturedSandwiches(): array
    {
        return $this->service->getFeaturedSandwiches() ?? [];
    }

}
