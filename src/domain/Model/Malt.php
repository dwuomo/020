<?php


namespace App\domain\Model;


class Malt extends Component
{
    public function __construct(string $name, Amount $amount)
    {
        parent::__construct($name, $amount);
    }
}