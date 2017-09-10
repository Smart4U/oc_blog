<?php

namespace App\Core\Http;

use GuzzleHttp\Psr7\Response;

class ResponseFactory
{

    public function __invoke(int $statusCode = 200, array $headers = [], ?string $body = null, float $version = 1.1)
    {
        return new Response($statusCode, $headers, $body, $version);
    }
}