<?php

namespace LaSportive\SDK\Gateway;


use Exception;
use LaSportive\SDK\Adapter\AdapterInterface;
use LaSportive\SDK\Factory\Collection\CollectionFactory;
use LaSportive\SDK\Manager\EntrypointManagerInterface;
use LaSportive\SDK\Response\ErrorResponse;

class DefaultGateway
{
    /**
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * @var EntrypointManagerInterface
     */
    protected $entrypointManager;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * DefaultGateway constructor.
     *
     * @param AdapterInterface $adapter
     */
    public function __construct(
        AdapterInterface $adapter,
        EntrypointManagerInterface $entrypointManager,
        CollectionFactory $collectionFactory
    ) {
        $this->adapter = $adapter;
        $this->entrypointManager = $entrypointManager;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * Call an entrypoint with given parameters
     *
     * @param $entrypointUid
     * @param array $parameters
     *
     * @return mixed||ErrorResponse
     */
    public function call($entrypointUid, array $parameters = [])
    {
        $entrypoint = $this->entrypointManager->getByUid($entrypointUid);
        $endpoint = $entrypoint->getEndpoint();

        if (!is_null($entrypoint) && count($entrypoint->getArguments())) {
            $expressions = [];
            $arguments = [];

            foreach ($entrypoint->getArguments() as $argument) {
                if (!array_key_exists($argument, $parameters)) {
                    throw new Exception('Missing mandatory parameter "' . $argument . '"');
                }

                $expressions[] = '#:' . $argument . '#';
                $arguments[] = $parameters[$argument];

                unset($parameters[$argument]);
            }

            $endpoint = preg_replace($expressions, $arguments, $endpoint);
        }

        $response = $this->adapter
            ->call(
                $entrypoint->getMethod(),
                $endpoint,
                $parameters
            )
        ;

        if (is_null($entrypoint->getFactory()) || $response instanceof ErrorResponse) {
            return $response;
        } else if ($entrypoint->isCollection()) {
            return $this->collectionFactory->factory(
                $entrypoint->getFactory(),
                $response->getData()
            );
        }

        return $entrypoint
            ->getFactory()
            ->factory($response->getData())
        ;
    }
}
