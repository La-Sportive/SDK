<?php

namespace LaSportive\SDK\Adapter;

use GuzzleHttp\Client;
use LaSportive\SDK\Response\ResponseInterface;

interface AdapterInterface
{
    /**
     * Call a REST Endpoint
     *
     * @param string $method HTTP Method to use
     * @param string $endpoint Endpoint URI to call
     * @param string[] $parameters An array of parameters
     *
     * @return ResponseInterface
     */
    public function call($method, $endpoint, array $parameters = []);

    /**
     * Get base URI
     *
     * @return string
     */
    public function getUri();

    /**
     * Set base URI
     *
     * @param string $uri
     *
     * @return AdapterInterface
     */
    public function setUri($uri);

    /**
     * Get adapter client
     *
     * @return Client
     */
    public function getClient();

    /**
     * Set adapter client
     *
     * @param Client $client
     *
     * @return AdapterInterface
     */
    public function setClient(Client $client);
}
