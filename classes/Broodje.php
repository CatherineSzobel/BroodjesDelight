<?php

declare(strict_types=1);
class Broodje
{
    private int $id = 0;
    private string $naam = "";
    private string $omschrijving = "";
    private float $prijs = 0.0;
    private string $foto = "";
    public function __construct(int $id, string $naam, string $omschrijving, float $prijs, string $foto)
    {
        $this->id = $id;
        $this->naam = $naam;
        $this->omschrijving = $omschrijving;
        $this->prijs = $prijs;
        $this->foto = $foto;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function  getNaam(): string
    {
        return $this->naam;
    }
    public function  getOmschrijving(): string
    {
        return $this->omschrijving;
    }
    public function getPrijs(): float
    {
        return $this->prijs;
    }
    public function getFoto(): string
    {
        return $this->foto;
    }
}
