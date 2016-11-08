<?php

namespace LaSportive\SDK\Factory\Collection;


use LaSportive\SDK\Factory\Entity\EntityFactoryInterface;

class CollectionFactory
{
    public function factory(EntityFactoryInterface $entityFactory, array $collectionDefinition)
    {
        $entityCollection = [];

        foreach ($collectionDefinition as $entityDefinition) {
            $entityCollection[] = $entityFactory->factory($entityDefinition);
        }

        return $entityCollection;
    }
}
