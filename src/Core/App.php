<?php


namespace App\Core;

use App\Core\Routing\Route;
use App\Core\Routing\Router;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ServerRequest;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;


/**
 * Class App
 * @package App\Core
 */
class App
{

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * App constructor initialize the dependencies
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Run this application
     * @return ResponseInterface
     */
    public function run() :ResponseInterface
    {

        $request = $this->container->make(ServerRequest::class);

        $routeResponse = $this->container->get(Router::class)->match($request);

        if ($routeResponse->isFailure()) {
            return new Response(404, [], 'Not Found');
        }

        foreach ($routeResponse->getMatchedParams() as $key => $value) {
            $request = $request->withAttribute($key, $value);
        }

        return $this->writeBack( new Route($routeResponse->getMatchedRouteName(),$routeResponse->getMatchedMiddleware(),$routeResponse->getMatchedParams()), $request);

    }

    /**
     * Return the application response
     * @param Route $route
     * @param ServerRequestInterface $request
     * @return mixed Exception|ResponseInterface
     * @throws \Exception
     */
    private function writeBack(Route $route, ServerRequestInterface $request) {

        [$controller, $action] = $route->getHandler();

        $handlerResponse = $this->container->get($controller)->$action($request);

        if ($handlerResponse instanceof ResponseInterface) {
            return $handlerResponse;
        }

        if (is_string($handlerResponse)) {
            $response = $this->container->get(Response::class);
            $response->getBody()->write($handlerResponse);
            return $response;
        }

        throw new \Exception('This response does not correct. Application wait an instance of (ResponseInterface)');
    }

}