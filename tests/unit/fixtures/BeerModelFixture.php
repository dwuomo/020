<?php


namespace App\Tests\unit\fixtures;


use App\domain\Model\Amount;
use App\domain\Model\Beer;
use App\domain\Model\BoilVolume;
use App\domain\Model\FoodPairing;
use App\domain\Model\Hops;
use App\domain\Model\Ingredients;
use App\domain\Model\Malt;
use App\domain\Model\MashTemperature;
use App\domain\Model\Method;
use App\domain\Model\Temperature;
use App\domain\Model\Volume;

class BeerModelFixture
{
    public function create(): Beer {
        $mashTemperature = new MashTemperature( 10, 'celsius', 5 );
        $fermentation = new Temperature( 10, "unit" );
        $method = new Method([$mashTemperature], [$fermentation]);
        $amount = new Amount(10.5, "unit");
        $malt = new Malt("malt", $amount);
        $hops = new Hops("hops", $amount, "add", "attribute");
        $ingredients = new Ingredients( [$malt], [$hops], 'yeast' );

        return new Beer(
            1,
            'name',
            'tagline',
            'first_brewed',
            'description',
            10.5,
            11,
            12,
            15,
            new Volume(10, "unit"),
            new BoilVolume(12, "unit"),
            $method,
            $ingredients,
            new FoodPairing(['malt', 'hops', 'kriptonite']),
            'brewed_tips',
            'dwuomo',
            'image_url',
            10,
            13,
            14,
            14.5
        );
    }

}