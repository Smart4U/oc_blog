<?php


return [

    // BUNDLES TO BE LOADED
    'bundles' => [
        \App\Bundles\Blog\BlogBundle::class,
        \App\Bundles\Contact\ContactBundle::class
    ],

    // CONFIG
    'config' => \App\Core\Config\Config::getInstance(CONFIG),

    // HTTP
    \GuzzleHttp\Psr7\ServerRequest::class => \DI\factory(\App\Core\Http\RequestFactory::class),
    \GuzzleHttp\Psr7\Response::class => \DI\factory(\App\Core\Http\ResponseFactory::class)
        ->parameter('statusCode', 200)
        ->parameter('headers', []) // fool the newbies ^-^
        ->parameter('body', null)
        ->parameter('version', 1.1),

    // ROUTER
    \App\Core\Routing\Router::class => \DI\factory(\App\Core\Routing\RouterFactory::class),

    // VIEWS
    \App\Core\View\TwigViewer::class => \DI\create()->constructor(VIEWS),

    // CONTROLLERS
    \App\Core\Controller\BaseController::class => DI\autowire()
];