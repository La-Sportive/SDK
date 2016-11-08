<?php

namespace LaSportive\SDK\Factory\Response;

use LaSportive\SDK\Response\ResponseInterface;

interface ResponseFactoryInterface
{
    /**
     * Create a default response from a response code and data
     *
     * @param $code
     * @param $data
     *
     * @return ResponseInterface
     */
    public function factory($code, $data);
}
