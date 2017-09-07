<?php

require dirname(__DIR__) . '/bootstrap.php';

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $router) {

    //Pages
    $router->addRoute('GET', '/', 'PagesController@home');
    $router->addRoute('GET', '/a-propos', 'PagesController@about');
    $router->addRoute('GET', '/contact', 'PagesController@contact');

    //Blog
    $router->addRoute('GET', '/blog', 'PostsController@index');
    $router->addRoute('GET', '/blog/article/{slug:\w+}-{id:\d+}', 'PostsController@show');

    // Admin
    $router->addGroup('/admin', function (\FastRoute\RouteCollector $router) {
        $router->addRoute('GET', '/posts', 'Admin/PostsController@index');
        $router->addRoute('GET', '/posts/show/{id:\d+}', 'Admin/PostsController@show');
        $router->addRoute('POST', '/posts', 'Admin/PostsController@store');
        $router->addRoute('PUT', '/posts/{id:\d+}', 'Admin/PostsController@update');
        $router->addRoute('DELETE', '/posts/{id:\d+}', 'Admin/PostsController@delete');
    });
});


// Request
$request = $container->get('Request');
$httpMethod = $request->getMethod();
$uri = $request->getUri()->getPath();
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

// Response
$response = $container->get('Response');

// Routing
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        // ... call $handler with $vars
        break;
}
