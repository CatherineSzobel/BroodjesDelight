<?php

declare(strict_types=1);

namespace App\Model;

use DateTime;

class Order
{

    private int $id;
    private int $sandwichId;
    private int $clientId;
    private DateTime $orderedTime;

    public function __construct(int $id, int $sandwichId, int $clientId, DateTime $orderedTime)
    {
        $this->id = $id;
        $this->sandwichId = $sandwichId;
        $this->clientId = $clientId;
        $this->orderedTime = $orderedTime;
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
}
