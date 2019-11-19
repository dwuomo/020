<?php


namespace App\domain\Model;


/**
 * Class MashTemperature
 * @package App\domain\Model
 */
class MashTemperature extends Temperature
{
    /** @var int $duration */
    private $duration;

    public function __construct(int $value, string $unit, int $duration=null)
    {
        parent::__construct($value, $unit);
        $this->duration = $duration;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }
}