<?php


namespace App\domain\infrastructure;


use App\domain\Model\Beer;

interface BeerRepository
{

    /**
     * @param string $filter
     * @return Beer[]
     */
    public function getBeersFilteredBy(string $filter): array ;

    /**
     * @param int $id
     * @return Beer
     */
    public function ofId(int $id): ?Beer;
}