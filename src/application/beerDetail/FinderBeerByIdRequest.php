<?php


namespace App\application\beerDetail;


/**
 * Class FinderBeerByIdRequest
 * @package App\application\beerDetail
 */
class FinderBeerByIdRequest
{
    private $id;

    /**
     * FinderBeerByIdRequest constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}