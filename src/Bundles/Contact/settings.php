<?php

use App\Bundles\Contact\ContactBundle;
use App\Bundles\Contact\Controllers\ContactController;


return [
    // BUNDLE
    ContactBundle::class => \DI\autowire(),

    // CONTROLLERS
    ContactController::class => \DI\autowire(),

    // ROUTES
    'contact.routes' => [
        '/contact' => [[ContactController::class, 'contact'], ['GET'], 'contact'],
    ],

    // VIEWS
    'contact.views.path' => dirname(__DIR__) . '/views'
];