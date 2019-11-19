<?php


namespace App\application\beer;

/**
 * Class FinderBeerFilteringByFoodRequest
 * @package App\application\beer
 */
class FinderBeerFilteringByFoodRequest
{
    private $food;

    /**
     * FinderBeerFilteringByFoodRequest constructor.
     * @param $food
     */
    public function __construct($food)
    {
        $this->food = $food;
    }

    /**
     * @return mixed
     */
    public function getFood()
    {
        return $this->food;
    }
}