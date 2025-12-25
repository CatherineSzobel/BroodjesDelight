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
     * Example rule: Only allow certain IDs (business rule)
     */
    public function getAllowedSandwiches(array $allowedIds): array
    {
        return array_filter($this->getAllSandwiches(), fn(Sandwich $b) => in_array($b->getId(), $allowedIds, true));
    }
}
