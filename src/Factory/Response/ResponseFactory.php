<?php

namespace LaSportive\SDK\Factory\Response;

use LaSportive\SDK\Response\DefaultResponse;
use LaSportive\SDK\Response\ErrorResponse;

class ResponseFactory implements ResponseFactoryInterface
{
    /**
     * @inheritdoc
     */
    public function factory($code, $data)
    {
        if (
            // HTTP OK
            $code != 200 &&

            // HTTP No Content
            $code != 204 &&

            // HTTP Created
            $code != 201
        ) {
            $response = new ErrorResponse();
        } else {
            $response = new DefaultResponse();
        }

        $response->setCode($code);
        $response->setData(
            json_decode($data, true)
        );

        return $response;
    }
}
