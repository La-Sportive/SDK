<?php

namespace LaSportive\SDK\Factory;

use LaSportive\SDK\Entity\Entrypoint;

interface EntrypointDefinitionFactoryInterface
{
    /**
     * Set an entrypoint from an array of definition
     *
     * @param Entrypoint $entrypoint
     * @param array $definition
     *
     * @return Entrypoint
     */
    public function factory(Entrypoint $entrypoint, array $definition);
}
