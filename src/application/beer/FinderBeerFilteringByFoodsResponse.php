<?php


namespace App\application\beer;


use App\application\dto\Beer;

class FinderBeerFilteringByFoodsResponse
{

    /** @var Beer[] */
    private $beer;

    /**
     * FinderBeerFilteringByFoodsResponse constructor.
     * @param Beer[] $beer
     */
    public function __construct(array $beer)
    {
        $this->beer = $beer;
    }

    /**
     * @return Beer[]
     */
    public function getBeer(): array
    {
        return $this->beer;
    }

    /**
     * @return Beer[]
     */
    public function jsonSerialize(): array
    {
        return array_map(function (Beer $beer) {
            return [
                'id' => $beer->getId(),
                'name' => $beer->getName(),
                'description' => $beer->getDescription()
            ];
        }, $this->beer);
    }
}