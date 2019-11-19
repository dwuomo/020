<?php


namespace App\domain\Model;


class BoilVolume extends Volume
{
    public function __construct(int $value, string $unit)
    {
        parent::__construct($value, $unit);
    }
}