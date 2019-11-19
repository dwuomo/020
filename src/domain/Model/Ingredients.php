<?php


namespace App\domain\Model;


class Ingredients
{
    /** @var Malt[] */
    private $malt;
    /** @var Hops[]  */
    private $hops;
    /** @var string $yeast */
    private $yeast;

    /**
     * Ingredients constructor.
     * @param Malt[] $malt
     * @param Hops[] $hops
     * @param string $yeast
     */
    public function __construct(array $malt, array $hops, string $yeast)
    {
        $this->malt = $malt;
        $this->hops = $hops;
        $this->yeast = $yeast;
    }

    /**
     * @return Malt[]
     */
    public function getMalt(): array
    {
        return $this->malt;
    }

    /**
     * @return Hops[]
     */
    public function getHops(): array
    {
        return $this->hops;
    }

    /**
     * @return string
     */
    public function getYeast(): string
    {
        return $this->yeast;
    }
}