<?php

declare(strict_types=1);
namespace App\Model;
class Client
{
    private int $id;
    private string $firstname;
    private string $lastname;
    private string $email;


    public function __construct(int $id, string $firstname, string $lastname, string $email)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
    }
    
    public function getClientId(): int { return $this->id; }
    public function getFirstName(): string { return $this->firstname; }
    public function getLastName(): string { return $this->lastname; }
    public function getEmail(): string { return $this->email; }
    public function getFullName(): string { return $this->firstname . ' ' . $this->lastname; }
}
