<?php


namespace App\domain\Model;


class Amount
{
    /** @var float */
    private $value;
    /** @var string $unit */
    private $unit;

    /**
     * Amount constructor.
     * @param float $value
     * @param string $unit
     */
    public function __construct(float $value, string $unit)
    {
        $this->value = $value;
        $this->unit = $unit;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }
}