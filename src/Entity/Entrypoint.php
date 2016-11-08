<?php

namespace LaSportive\SDK\Entity;


use LaSportive\SDK\Factory\Entity\EntityFactoryInterface;
use LaSportive\SDK\Model\EntrypointModelInterface;

class Entrypoint implements EntrypointModelInterface
{
    /**
     * @var string
     */
    protected $uid;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var string[]
     */
    protected $arguments;

    /**
     * @var string
     */
    protected $method;

    /**
     * @var EntityFactoryInterface
     */
    protected $factory;

    /**
     * @var bool
     */
    protected $collection;

    /**
     * @inheritdoc
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @inheritdoc
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @inheritdoc
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @inheritdoc
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * @inheritdoc
     */
    public function setArguments($arguments)
    {
        $this->arguments = $arguments;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @inheritdoc
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getFactory()
    {
        return $this->factory;
    }

    /**
     * @inheritdoc
     */
    public function setFactory(EntityFactoryInterface $factory)
    {
        $this->factory = $factory;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function isCollection()
    {
        return $this->collection;
    }

    /**
     * @inheritdoc
     */
    public function setCollection($collection)
    {
        $this->collection = $collection;
        return $this;
    }
}
