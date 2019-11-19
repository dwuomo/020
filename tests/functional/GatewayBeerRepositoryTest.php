<?php


namespace App\Tests\functional;


use App\domain\Model\Beer;
use App\infrastructure\GatewayBeerRepository;
use App\infrastructure\GatewayBeerRepositoryTransformer;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class GatewayBeerRepositoryTest extends TestCase
{
    /**
     * @var Client
     */
    private $client;
    /**
     * @var GatewayBeerRepository
     */
    private $gateway;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = new Client([
            'base_uri' => 'https://api.punkapi.com/v2/',
            'timeout'  => 2.0,
        ]);

        $transformer = new GatewayBeerRepositoryTransformer();
        $this->gateway = new GatewayBeerRepository($this->client, $transformer);
    }

    public function test_should_return_beers_from_punk_api_filtering() {

        $actual = $this->gateway->getBeersFilteredBy("Stilton on gingerbread biscuits");

        $this->assertInstanceOf(Beer::class, $actual[0]);
        $this->assertLessThan(25, count($actual));
    }

    public function test_should_return_beers_from_punk_api_no_filtering() {
        $actual = $this->gateway->getBeersFilteredBy("");

        $this->assertInstanceOf(Beer::class, $actual[0]);
        $this->assertCount(25, $actual);
    }

    public function test_get_single_beer_by_id() {
        $actual = $this->gateway->ofId(1);

        $this->assertInstanceOf(Beer::class, $actual);
    }

    public function test_get_single_beer_by_id_not_found() {
        $actual = $this->gateway->ofId(3000);

        $this->assertNull($actual);
    }
}