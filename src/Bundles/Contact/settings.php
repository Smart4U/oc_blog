<?php

use App\Bundles\Contact\ContactBundle;
use App\Bundles\Contact\Controllers\ContactController;


return [
    // BUNDLE
    ContactBundle::class => DI\autowire(),

    // CONTROLLERS
    ContactController::class => DI\create()->constructor(\GuzzleHttp\Psr7\ServerRequest::class, \App\Core\View\TwigViewer::class),

    // ROUTES
    'contact.routes' => [
        '/contact' => [[ContactController::class, 'contact'], ['GET'], 'contact'],
    ]
];