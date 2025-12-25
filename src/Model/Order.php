<?php

declare(strict_types=1);

namespace App\Model;

use DateTime;

class Order
{

    public const STATUS_PENDING = 1;
    public const STATUS_ORDERED = 2;
    public const STATUS_DONE = 3;

    private int $id;
    private int $sandwichId;
    private int $clientId;
    private DateTime $orderedTime;
    private int $status;

    public function __construct(int $id, int $sandwichId, int $clientId, DateTime $orderedTime, int $status = self::STATUS_PENDING)
    {
        $this->id = $id;
        $this->sandwichId = $sandwichId;
        $this->clientId = $clientId;
        $this->orderedTime = $orderedTime;
        $this->status = $status;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getSandwichId(): int
    {
        return $this->sandwichId;
    }
    public function getClientId(): int
    {
        return $this->clientId;
    }
    public function getOrderedTime(): DateTime
    {
        return $this->orderedTime;
    }
    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }
}
