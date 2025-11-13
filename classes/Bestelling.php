<?php

declare(strict_types=1);
class Bestelling
{
    private int $bestelID;
    private int $broodjeID;
    private int $klantID;
    private DateTime $afhalingsmoment;
    private int $status;

    public function __construct(int $bestelID, int $broodjeID, int $klantID, DateTime $afhalingsmoment, int $status)
    {
        $this->bestelID = $bestelID;
        $this->broodjeID = $broodjeID;
        $this->klantID = $klantID;
        $this->afhalingsmoment = $afhalingsmoment;
        $this->status = $status;
    }

    public function getBroodjeID(): int
    {
        return $this->broodjeID;
    }
    public function getBestelID(): int
    {
        return $this->bestelID;
    }
    public function getKlantID(): int
    {
        return $this->klantID;
    }
    public function getAfhalingsmoment(): DateTime
    {
        return $this->afhalingsmoment;
    }
    public function getStatus(): int
    {
        return $this->status;
    }
}
