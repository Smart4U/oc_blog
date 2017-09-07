<?php

require dirname(__DIR__) . '/bootstrap.php';


$request = \GuzzleHttp\Psr7\ServerRequest::fromGlobals();

$response = new \GuzzleHttp\Psr7\Response(
    200,
    ['x-powered-by' => 'oc_blog'],
    null,
    1.1
);