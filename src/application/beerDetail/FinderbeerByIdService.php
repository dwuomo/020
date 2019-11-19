<?php


namespace App\application\beerDetail;


use App\domain\infrastructure\BeerRepository;

/**
 * Class FinderbeerByIdService
 * @package App\application\beerDetail
 */
class FinderbeerByIdService
{
    /**
     * @var BeerRepository
     */
    private $beerRepository;

    /**
     * FinderbeerByIdService constructor.
     * @param BeerRepository $beerRepository
     */
    public function __construct(BeerRepository $beerRepository)
    {
        $this->beerRepository = $beerRepository;
    }

    /**
     * @param FinderBeerByIdRequest $request
     * @return FinderBeerByIdResponse
     */
    public function handle(FinderBeerByIdRequest $request): ?FinderBeerByIdResponse {
        if (empty($request->getId())) {
            return null;
        }

        $beer = $this->beerRepository->ofId($request->getId());

        if (empty($beer)) {
            return null;
        }

        return new FinderBeerByIdResponse(
            $beer->getId(),
            $beer->getName(),
            $beer->getDescription(),
            $beer->getTagline(),
            $beer->getFirstBrewed(),
            $beer->getImageUrl()
        );
    }

}