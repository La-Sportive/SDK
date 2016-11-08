<?php

namespace LaSportive\SDK\Response;


class ErrorResponse implements ResponseInterface
{
    /**
     * @var string
     */
    protected $code;

    /**
     * @var mixed
     */
    protected $data;

    /**
     * @inheritdoc
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @inheritdoc
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @inheritdoc
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
}
