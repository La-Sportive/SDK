<?php

namespace LaSportive\SDK\Factory\Entity;


interface EntityFactoryInterface
{
    /**
     * Build an entity from a data array
     *
     * @param array $data
     *
     * @return mixed
     */
    public function factory($data);
}
