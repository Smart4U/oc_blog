<?php

namespace App\Core\Routing;

use Zend\Expressive\Router\Route as ZendFastRoute;


class Route extends ZendFastRoute
{

    public function __construct($path, $middleware, $methods = ZendFastRoute::HTTP_METHOD_ANY, $name = null)
    {
        ZendFastRoute::__construct($path, $middleware, $methods, $name);
    }

    public function getHandler() {
        return $this->getMiddleware();
    }

    public function getRequestData() {
        return $this->getAllowedMethods();
    }

}