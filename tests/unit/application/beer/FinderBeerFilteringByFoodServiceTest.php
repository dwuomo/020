<?php


namespace App\Tests\unit\application\beer;


use App\application\beer\FinderBeerFilteringByFoodRequest;
use App\application\beer\FinderBeerFilteringByFoodService;
use App\application\beer\FinderBeerFilteringByFoodsResponse;
use App\domain\infrastructure\BeerRepository;
use App\Tests\unit\fixtures\BeerModelFixture;
use PHPUnit\Framework\TestCase;

class FinderBeerFilteringByFoodServiceTest extends TestCase
{
    /**
     * @var  BeerRepository | \PHPUnit\Framework\MockObject\MockObject
     */
    private $beerRepositoryMock;
    /**
     * @var BeerModelFixture
     */
    private $beerModelFixture;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->beerModelFixture = new BeerModelFixture();

        $this->beerRepositoryMock = $this
            ->getMockBuilder(BeerRepository::class)
            ->getMock();
    }

    public function test_should_obtain_beers_filtered() {
        $usecase = new FinderBeerFilteringByFoodService($this->beerRepositoryMock);
        $requestFixture = new FinderBeerFilteringByFoodRequest("Spicy chicken tikka masala");
        $beerFixture = [$this->beerModelFixture->create()];

        $this->beerRepositoryMock
            ->expects($this->once())
            ->method('getBeersFilteredBy')
            ->willReturn($beerFixture);

        $actual = $usecase->handle($requestFixture);
        /** @var \App\application\dto\Beer $beerActual */
        $beerActual = $actual->getBeer()[0];

        $this->assertInstanceOf(FinderBeerFilteringByFoodsResponse::class, $actual);
        $this->assertEquals($beerActual->getId(), $beerFixture[0]->getId());
        $this->assertEquals($beerActual->getName(), $beerFixture[0]->getName());
        $this->assertEquals($beerActual->getDescription(), $beerFixture[0]->getDescription());
    }

    public function test_with_empty_response() {
        $usecase = new FinderBeerFilteringByFoodService($this->beerRepositoryMock);
        $requestFixture = new FinderBeerFilteringByFoodRequest("Spicy chicken tikka masala");

        $this->beerRepositoryMock
            ->expects($this->once())
            ->method('getBeersFilteredBy')
            ->willReturn([]);

        $actual = $usecase->handle($requestFixture);
        $this->assertEmpty($actual->getBeer());
    }
}