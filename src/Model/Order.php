<?php

declare(strict_types=1);

namespace App\Model;

use DateTime;

class Order
{

    public function __construct(private int $id, private int $sandwichId, private int $clientId, private DateTime $orderedTime) {}

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
