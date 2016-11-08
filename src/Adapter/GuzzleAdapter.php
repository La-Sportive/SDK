<?php

namespace LaSportive\SDK\Adapter;


use GuzzleHttp\Client;
use LaSportive\SDK\Factory\Response\ResponseFactoryInterface;

class GuzzleAdapter implements AdapterInterface
{
    /**
     * @var string
     */
    protected $uri;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var ResponseFactoryInterface
     */
    protected $responseFactory;

    /**
     * @inheritdoc
     */
    public function __construct(ResponseFactoryInterface $responseFactory) {
        $this->responseFactory = $responseFactory;
    }

    /**
     * @inheritdoc
     */
    public function call($method, $endpoint, array $parameters = [])
    {
        $options = [ 'http_errors' => false ];
        $uri = $this->getUri() . '/' . $endpoint;

        if ('POST' == strtoupper($method)) {
            $options['form_params'] = $parameters;
        } else {
            $uri .= '?' . http_build_query($parameters);
        }

        $response = $this->getClient()
            ->request($method, $uri, $options)
        ;

        return $this->responseFactory->factory(
            $response->getStatusCode(),
            (string) $response->getBody()
        );
    }

    /**
     * @inheritdoc
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @inheritdoc
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getClient()
    {
        if (empty($this->client)) {
            $this->client = new Client([ 'base_uri' => $this->uri ]);
        }

        return $this->client;
    }

    /**
     * @inheritdoc
     */
    public function setClient(Client $client)
    {
        $this->client = $client;
        return $this;
    }
}
