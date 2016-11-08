<?php

namespace LaSportive\SDK\Factory;


use LaSportive\SDK\Entity\Entrypoint;
use LaSportive\SDK\Factory\Entity\EntityFactoryInterface;
use LogicException;

class EntrypointDefinitionFactory implements EntrypointDefinitionFactoryInterface
{
    /**
     * @inheritdoc
     */
    public function factory(Entrypoint $entrypoint, array $definition)
    {
        $entrypoint->setName(
            array_key_exists('name', $definition) ? $definition['name'] : ''
        );
        $entrypoint->setDescription(
            array_key_exists('description', $definition) ? $definition['description'] : ''
        );
        $entrypoint->setEndpoint(
            array_key_exists('endpoint', $definition) ? $definition['endpoint'] : ''
        );
        $entrypoint->setMethod(
            array_key_exists('method', $definition) ? $definition['method'] : ''
        );
        $entrypoint->setCollection(
            array_key_exists('is_collection', $definition) ? (bool)$definition['is_collection'] : false
        );

        $arguments = [];
        if (array_key_exists('endpoint', $definition)) {

            preg_match_all('#:([^/]+)#', $definition['endpoint'], $arguments);
            $entrypoint->setArguments($arguments[1]);

        } else {
            $entrypoint->setArguments($arguments);
        }

        if (array_key_exists('factory', $definition)) {
            $factoryFQDN = $definition['factory'];
            $factory = new $factoryFQDN();
            
            if (!$factory instanceof EntityFactoryInterface) {
                throw new LogicException(get_class($factory) . ' must implement EntityFactoryInterface interface');
            }
            
            $entrypoint->setFactory($factory);
        }

        return $entrypoint;
    }
}
