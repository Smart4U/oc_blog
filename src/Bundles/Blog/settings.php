<?php

use App\Bundles\Blog\BlogBundle;
use App\Bundles\Blog\Controllers\BlogController;

return [

    // BUNDLE
    BlogBundle::class => DI\autowire(),

    // CONTROLLERS
    BlogController::class => Di\autowire(),

    // ROUTES
    'blog.routes' => [
        '/blog' => [[BlogController::class, 'index'], ['GET'], 'home'],
        '/blog/article/{slug:[a-zA-Z0-9-]+}-{id:[0-9]+}' => [[BlogController::class, 'index'], ['GET'], 'home'],
    ]

];