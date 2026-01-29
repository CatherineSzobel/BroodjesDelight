<?php

declare(strict_types=1);

namespace App\Model;

class Sandwich
{

    public function __construct(private int $id, private string $name, private string $description, private float $price, private string $picture) {}

    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    public function getPicture(): string
    {
        return $this->picture;
    }

    public function getFormattedPrice(): string
    {
        return '€' . number_format($this->price, 2);
    }
}
