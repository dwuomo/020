<?php


namespace App\Controller;


use App\application\beer\FinderBeerFilteringByFoodRequest;
use App\application\beer\FinderBeerFilteringByFoodService;
use App\application\beerDetail\FinderBeerByIdRequest;
use App\application\beerDetail\FinderbeerByIdService;
use App\infrastructure\GatewayBeerRepository;
use App\infrastructure\GatewayBeerRepositoryTransformer;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class MainController
 * @package App\Controller
 */
class  MainController
{
    const HTTPS_API_PUNKAPI_COM_V_2 = 'https://api.punkapi.com/v2/';
    /**
     * @var GatewayBeerRepositoryTransformer
     */
    private $transformer;
    /**
     * @var Client
     */
    private $client;
    /**
     * @var GatewayBeerRepository
     */
    private $repository;

    /**
     * MainController constructor.
     * @param GatewayBeerRepositoryTransformer $transformer
     */
    public function __construct(GatewayBeerRepositoryTransformer $transformer)
    {
        $client = new Client(['base_uri' => self::HTTPS_API_PUNKAPI_COM_V_2, 'timeout'  => 2.0,]);
        $this->transformer = $transformer;
        $this->repository = new GatewayBeerRepository($client, $this->transformer);
    }

    /**
     * @Route("/beers", name="beer_list")
     * @param Request $request
     * @return Response
     */
    public function list(Request $request)
    {
        $pairing = $request->query->get('pairing') ?? "";

        $beers = (new FinderBeerFilteringByFoodService($this->repository))
            ->handle(new FinderBeerFilteringByFoodRequest($pairing));

        return new Response(
            json_encode($beers->jsonSerialize()),
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );
    }

    /**
     * @Route("/beers/{id}", name="beer_detail")
     * @return Response
     */
    public function detail($id) {
        $id = $id ?? null;
        $status = Response::HTTP_NOT_FOUND;
        $message = "";

        $beer = (new FinderbeerByIdService($this->repository))
            ->handle(new FinderBeerByIdRequest($id));

        if (!empty($beer)) {
            $status = Response::HTTP_OK;
            $message = json_encode($beer->jsonSerialize());
        }

        return new Response($message, $status, ['content-type' => 'application/json']);
    }
}