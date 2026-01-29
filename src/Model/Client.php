<?php

declare(strict_types=1);

namespace App\Model;

class Client
{
    public function __construct(private int $id, private string $firstname, private string $lastname, private string $email) {}

    public function getClientId(): int
    {
        return $this->id;
    }
    public function getFirstName(): string
    {
        return $this->firstname;
    }
    public function getLastName(): string
    {
        return $this->lastname;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getFullName(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}
