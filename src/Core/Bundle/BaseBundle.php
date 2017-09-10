<?php

namespace App\Core\Bundle;

use App\Core\Routing\Router;
use Zend\Expressive\Router\Route;
use Zend\Expressive\Router\FastRouteRouter;

/**
 * Class BaseBundle
 * @package App\Core\Bundle
 */
class BaseBundle
{

    const BUNDLE_NAME = null;
    const INIT_BUNDLE = null;

    /**
     * @var FastRouteRouter
     */
    private $router;
    private $settings;

    /**
     * BaseBundle constructor.
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * @param $settings
     * @return bool
     */
    private function fileSettingsBundleExist($settings) :bool {
        return file_exists($settings) ?  true : false;
    }

    /**
     * Load the bundle config
     * @param $settings
     * @throws BundleException
     */
    protected function loadSettingsBundle($settings) {

        if( !$this->fileSettingsBundleExist($settings)){
            throw new BundleException('Settings bundle not found.');
        }

        $this->settings = require($settings);
        if( is_iterable($this->settings[static::BUNDLE_NAME.'.routes'])){

            foreach ($this->settings[static::BUNDLE_NAME.'.routes'] as $path => $route) {
                $this->router->addRoute(new Route($path, current($route)));
            }

        }

    }


}