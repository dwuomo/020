<?php


namespace App\infrastructure;

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

class GatewayBeerRepositoryTransformer
{

    /**
     * @param array $response
     * @return Beer[]
     */
    public function populateBeersCollection(array $response): array {
        return array_map(function ($item) {
            return $this->populateBeer($item);
        }, $response);
    }

    /**
     * @param array $beerResponse
     * @return Beer
     */
    public function populateBeer(array $beerResponse): Beer {
        return new Beer(
            $beerResponse['id'],
            $beerResponse['name'],
            $beerResponse['tagline'],
            $beerResponse['first_brewed'],
            $beerResponse['description'],
            $beerResponse['abv'],
            $beerResponse['target_fg'],
            $beerResponse['target_og'],
            $beerResponse['attenuation_level'],
            new Volume($beerResponse['volume']['value'], $beerResponse['volume']['unit']),
            new BoilVolume($beerResponse['boil_volume']['value'], $beerResponse['boil_volume']['unit']),
            $this->populateMethod($beerResponse),
            $this->populateIngredients($beerResponse),
            new FoodPairing($beerResponse['food_pairing']),
            $beerResponse['brewers_tips'],
            $beerResponse['contributed_by'],
            $beerResponse['image_url'],
            $beerResponse['ibu'],
            $beerResponse['ebc'],
            $beerResponse['srm'],
            $beerResponse['ph']
        );
    }

    /**
     * @param array $item
     * @return Ingredients
     */
    private function populateIngredients(array $item): Ingredients {
        return new Ingredients(
            $this->getMalt($item['ingredients']['malt']),
            $this->getHops($item['ingredients']['hops']),
            $item['ingredients']['yeast']
        );

    }

    /**
     * @param array $item
     * @return Method
     */
    private function populateMethod(array $item): Method {
        return new Method(
            $this->getMashTemperature($item['method']['mash_temp']),
            $this->getFermentation($item['method']['fermentation'])
        );
    }

    /**
     * @param array $mashTemperature
     * @return MashTemperature[]
     */
    private function getMashTemperature(array $mashTemperature): array {
        return array_map(function ($value) {
            return new MashTemperature(
                $value['temp']['value'],
                $value['temp']['unit'],
                $value['duration']
            );
        }, $mashTemperature);
    }

    /**
     * @param $fermentation
     * @return Temperature[]
     */
    private function getFermentation($fermentation): array
    {
        return array_map(function($value){
            return new Temperature(
                $value['value'],
                $value['unit']
            );
        }, $fermentation);
    }

    /**
     * @param $malt
     * @return Malt[]
     */
    private function getMalt($malt): array
    {
        return array_map(function($value){
            return new Malt(
                $value['name'],
                new Amount($value['amount']['value'], $value['amount']['unit'])
            );
        }, $malt);
    }

    /**
     * @param $hops
     * @return Hops[]
     */
    private function getHops($hops): array
    {
        return array_map(function ($value) {
            return new Hops(
                $value['name'],
                new Amount($value['amount']['value'], $value['amount']['unit']),
                $value['add'],
                $value['attribute']
            );
        }, $hops);
    }
}