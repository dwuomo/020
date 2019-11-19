<?php


namespace App\domain\Model;


class Component
{
    /** @var string  */
    private $name;
    /** @var Amount */
    private $amount;

    /**
     * Component constructor.
     * @param string $name
     * @param Amount $amount
     */
    public function __construct(string $name, Amount $amount)
    {
        $this->name = $name;
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Amount
     */
    public function getAmount(): Amount
    {
        return $this->amount;
    }
}