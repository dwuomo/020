<?php


namespace App\domain\Model;


/**
 * Class Method
 * @package App\domain\Model
 */
class Method
{
    /** @var MashTemperature[] */
    private $mashTemperature;
    /** @var Temperature[] */
    private $fermentation;

    /**
     * Method constructor.
     * @param MashTemperature[] $mashTemperature
     * @param Temperature[] $fermentation
     */
    public function __construct(array $mashTemperature, array $fermentation)
    {
        $this->mashTemperature = $mashTemperature;
        $this->fermentation = $fermentation;
    }

    /**
     * @return MashTemperature[]
     */
    public function getMashTemperature(): array
    {
        return $this->mashTemperature;
    }

    /**
     * @return Temperature[]
     */
    public function getFermentation(): array
    {
        return $this->fermentation;
    }
}