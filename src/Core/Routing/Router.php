<?php

namespace App\Core\Routing;

use Psr\Http\Message\ServerRequestInterface as Request;
use Zend\Expressive\Router\FastRouteRouter;

class Router extends FastRouteRouter
{

    public function __construct($router = null, $dispatcherFactory = null, array $config = null)
    {
        parent::__construct($router, $dispatcherFactory, $config);
    }


    public function match(Request $request)
    {
        return parent::match($request);
    }

}