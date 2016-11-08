<?php

namespace LaSportive\SDK\Response;

interface ResponseInterface
{
    /**
     * Return response code
     *
     * @return string
     */
    public function getCode();

    /**
     * Set response code
     *
     * @param string $code
     *
     * @return ResponseInterface
     */
    public function setCode($code);

    /**
     * Return response data content
     *
     * @return array
     */
    public function getData();

    /**
     * Set response data content
     *
     * @param mixed $data
     *
     * @return ResponseInterface
     */
    public function setData($data);
}
