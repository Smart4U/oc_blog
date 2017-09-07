<?php

return [

    // Config
    'Config' => \App\Core\Config::getInstance(CONFIG),

    // HTTP
    'Request' => function() {
        return \GuzzleHttp\Psr7\ServerRequest::fromGlobals();
    },
    'Response' => function() {
        return new \GuzzleHttp\Psr7\Response(200, [], null,1.1);
    }
];