<?php


namespace App\application\beer;


use App\application\dto\Beer;
use App\domain\infrastructure\BeerRepository;

class FinderBeerFilteringByFoodService
{
    /**
     * @var BeerRepository
     */
    private $beerRepository;

    /**
     * FinderBeerFilteringByFoodService constructor.
     * @param BeerRepository $beerRepository
     */
    public function __construct(BeerRepository $beerRepository)
    {
        $this->beerRepository = $beerRepository;
    }

    public function handle(FinderBeerFilteringByFoodRequest $request) {
        $beersFiltered = $this->beerRepository->getBeersFilteredBy($request->getFood());

        $beersResponse = array_map(function (\App\domain\Model\Beer $model) {
            return new Beer(
                $model->getId(),
                $model->getName(),
                $model->getDescription()
            );
        }, $beersFiltered);

        return new FinderBeerFilteringByFoodsResponse($beersResponse);
    }

}