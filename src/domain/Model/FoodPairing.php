<?php


namespace App\domain\Model;


class FoodPairing
{
    /** @var string[] */
    private $pairings = [];

    /**
     * FoodPairing constructor.
     * @param string[] $pairings
     */
    public function __construct(array $pairings)
    {
        $this->pairings = $pairings;
    }

    /**
     * @return string[]
     */
    public function getPairings(): array
    {
        return $this->pairings;
    }
}