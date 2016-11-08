<?php

namespace LaSportive\SDK\Manager;


use LaSportive\SDK\Entity\Entrypoint;
use LaSportive\SDK\Exception\EntrypointNotFoundException;
use LaSportive\SDK\Factory\EntrypointDefinitionFactoryInterface;

class EntrypointManager implements EntrypointManagerInterface
{
    /**
     * @var Entrypoint[]
     */
    protected $entrypoints = [];

    /**
     * @var EntrypointDefinitionFactoryInterface
     */
    protected $entrypointDefinitionFactory;

    /**
     * EntrypointManager constructor.
     *
     * @param EntrypointDefinitionFactoryInterface $entrypointDefinitionFactory
     */
    public function __construct(EntrypointDefinitionFactoryInterface $entrypointDefinitionFactory)
    {
        $this->entrypointDefinitionFactory = $entrypointDefinitionFactory;
    }

    /**
     * @inheritdoc
     */
    public function getAll()
    {
        return array_values($this->entrypoints);
    }

    /**
     * @inheritdoc
     */
    public function getByUid($uid)
    {
        if (!array_key_exists($uid, $this->entrypoints)) {
            throw new EntrypointNotFoundException("Entrypoint with UID $uid not found");
        }

        return $this->entrypoints[$uid];
    }

    /**
     * @inheritdoc
     */
    public function createFromDefinition($uid, array $definition)
    {
        $entrypoint = $this->create($uid);

        $this->entrypointDefinitionFactory->factory($entrypoint, $definition);

        $this->update($entrypoint);

        return $entrypoint;
    }

    /**
     * @inheritdoc
     */
    public function create($uid)
    {
        if (array_key_exists($uid, $this->entrypoints)) {
            return $this->entrypoints[$uid];
        }

        $entrypoint = new Entrypoint();

        $entrypoint->setUid($uid);

        $this->entrypoints[$entrypoint->getUid()] = $entrypoint;

        return $entrypoint;
    }

    /**
     * @inheritdoc
     */
    public function update(Entrypoint $entrypoint)
    {
        if (!array_key_exists($entrypoint->getUid(), $this->entrypoints)) {
            return $entrypoint;
        }

        $this->entrypoints[$entrypoint->getUid()] = $entrypoint;

        return $entrypoint;
    }

    /**
     * @inheritdoc
     */
    public function delete(Entrypoint $entrypoint)
    {
        if (!array_key_exists($entrypoint->getUid(), $this->entrypoints)) {
            return;
        }

        unset($this->entrypoints[$entrypoint->getUid()]);
        unset($entrypoint);

        return;
    }
}
