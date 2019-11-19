<?php


namespace App\Tests\unit\application\beerDetail;


use App\application\beerDetail\FinderBeerByIdRequest;
use App\application\beerDetail\FinderBeerByIdResponse;
use App\application\beerDetail\FinderbeerByIdService;
use App\domain\infrastructure\BeerRepository;
use App\Tests\unit\fixtures\BeerModelFixture;
use PHPUnit\Framework\TestCase;

class FinderBeerByIdServiceTest extends TestCase
{
    /**
     * @var FinderbeerByIdService
     */
    private $service;
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject | BeerRepository
     */
    private $beerRepositoryMock;
    /**
     * @var BeerModelFixture
     */
    private $beerFixture;

    protected function setUp(): void
    {
        $this->beerFixture = new BeerModelFixture();

        $this->beerRepositoryMock = $this
            ->getMockBuilder(BeerRepository::class)
            ->getMock();

        $this->service = new FinderbeerByIdService(
           $this->beerRepositoryMock
        );

    }

    public function test_should_collect_beer_by_id() {
        $request = new FinderBeerByIdRequest(1);
        $expected = $this->beerFixture->create();

        $this->beerRepositoryMock
            ->expects($this->once())
            ->method('ofId')
            ->willReturn($expected);

        $actual = $this->service->handle($request);

        $this->assertInstanceOf(FinderBeerByIdResponse::class, $actual);
        $this->assertEquals($expected->getId(), $actual->getId());
        $this->assertEquals($expected->getName(), $actual->getName());
        $this->assertEquals($expected->getImageUrl(), $actual->getImage());
        $this->assertEquals($expected->getTagline(), $actual->getTagline());
        $this->assertEquals($expected->getFirstBrewed(), $actual->getFirstBrewed());
    }

    public function test_with_empty_response() {
        $request = new FinderBeerByIdRequest(1);

        $this->beerRepositoryMock
            ->expects($this->once())
            ->method('ofId')
            ->willReturn(null);

        $actual = $this->service->handle($request);
    }

    public function test_with_null_id() {
        $request = new FinderBeerByIdRequest(null);

        $this->beerRepositoryMock
            ->expects($this->never())
            ->method('ofId')
            ->willReturn(null);

        $actual = $this->service->handle($request);
    }
}