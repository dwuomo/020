<?php


namespace App\domain\Model;


class Hops extends Component
{
    /** @var string $add */
    private $add;
    /** @var string $attribute */
    private $attribute;

    public function __construct(string $name, Amount $amount, string $add, string $attribute)
    {
        parent::__construct($name, $amount);
        $this->add = $add;
        $this->attribute = $attribute;
    }

    /**
     * @return string
     */
    public function getAdd(): string
    {
        return $this->add;
    }

    /**
     * @return string
     */
    public function getAttribute(): string
    {
        return $this->attribute;
    }
}