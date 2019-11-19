<?php


namespace App\domain\Model;


class Volume
{
    /** @var int $value */
    private $value;
    /** @var string $unit */
    private $unit;

    /**
     * Volume constructor.
     * @param int $value
     * @param string $unit
     */
    public function __construct(int $value, string $unit)
    {
        $this->value = $value;
        $this->unit = $unit;
    }

    /**
     * @return int
     */
    public function getValue(): int
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