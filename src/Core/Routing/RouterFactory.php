<?php

namespace App\Core\Routing;

use Psr\Container\ContainerInterface;
/**
 * Create and return an instance of FastRouteRouter.
 *
 * Configuration should look like the following:
 *
 * <code>
 * 'router' => [
 *     'fastroute' => [
 *         'cache_enabled' => true, // true|false
 *         'cache_file'   => '(/absolute/)path/to/cache/file', // optional
 *     ],
 * ]
 * </code>
 */
class RouterFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->has('routing.cache_enabled')
            ? $container->get('routing.cache_enabled')
            : [];

        return new Router(null, null, $config);
    }
}