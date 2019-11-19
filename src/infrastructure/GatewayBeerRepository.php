<?php

namespace App\infrastructure;


use App\domain\infrastructure\BeerRepository;
use App\domain\Model\Beer;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class GatewayBeerRepository
 * @package App\infrastructure
 */
class GatewayBeerRepository implements BeerRepository
{
    /**
     * @var Client
     */
    private $client;
    /**
     * @var GatewayBeerRepositoryTransformer
     */
    private $transformer;

    /**
     * GatewayBeerRepository constructor.
     * @param Client $client
     * @param GatewayBeerRepositoryTransformer $transformer
     */
    public function __construct(Client $client, GatewayBeerRepositoryTransformer $transformer)
    {
        $this->client = $client;
        $this->transformer = $transformer;
    }

    /**
     * @param string $filter
     * @return Beer[]
     */
    public function getBeersFilteredBy(string $filter): array
    {
        try {
            $query = !empty($filter)
                ? ['food' => str_replace(" ", "_", $filter)]
                : [];

            $response = $this->client->request('GET', 'beers', ['query' => $query]);
            $body = json_decode($response->getBody(), true);
            return $this->transformer->populateBeersCollection($body);
        } catch (GuzzleException $e) {
            return [];
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * @param int $id
     * @return Beer
     */
    public function ofId(int $id): ?Beer
    {
        try {
            $response = $this->client->request('GET', 'beers/'.$id);
            $body = (array) json_decode($response->getBody(), true);

            return $this->transformer->populateBeer($body[0]);
        } catch (GuzzleException $e) {
            return null;
        }
    }
}