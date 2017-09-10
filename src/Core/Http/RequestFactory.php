<?php

namespace App\Core\Http;

use GuzzleHttp\Psr7\ServerRequest;

class RequestFactory
{

    public function __invoke()
    {
        return ServerRequest::fromGlobals();
    }

}