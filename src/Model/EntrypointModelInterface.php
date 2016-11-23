<?php

namespace LaSportive\SDK\Model;

use LaSportive\SDK\Factory\Entity\EntityFactoryInterface;
use LaSportive\SDK\Entity\Entrypoint;

interface EntrypointModelInterface
{
    /**
     * @return string
     */
    public function getUid();

    /**
     * @param string $uid
     *
     * @return Entrypoint
     */
    public function setUid($uid);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     *
     * @return Entrypoint
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $description
     *
     * @return Entrypoint
     */
    public function setDescription($description);

    /**
     * @return string
     */
    public function getEndpoint();

    /**
     * @param string $endpoint
     *
     * @return Entrypoint
     */
    public function setEndpoint($endpoint);

    /**
     * @return \string[]
     */
    public function getArguments();

    /**
     * @param \string[] $arguments
     * @return Entrypoint
     */
    public function setArguments($arguments);

    /**
     * @return string
     */
    public function getMethod();

    /**
     * @param string $method
     * @return Entrypoint
     */
    public function setMethod($method);

    /**
     * @return EntityFactoryInterface
     */
    public function getFactory();

    /**
     * @param EntityFactoryInterface $factory
     *
     * @return Entrypoint
     */
    public function setFactory(EntityFactoryInterface $factory);

    /**
     * @return boolean
     */
    public function isCollection();

    /**
     * @param boolean $collection
     * @return Entrypoint
     */
    public function setCollection($collection);
}
