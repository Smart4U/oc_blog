<?php


namespace App\Bundles\Blog;


use App\Core\Bundle\BaseBundle;
use App\Core\Routing\Router;

/**
 * Class BlogBundle
 * @package App\Bundles\Blog
 */
class BlogBundle extends BaseBundle
{

    const BUNDLE_NAME = 'blog';
    const INIT_BUNDLE = __DIR__ .'/settings.php';


    /**
     * BlogBundle constructor.
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        parent::__construct($router);
        $this->loadSettingsBundle(static::INIT_BUNDLE);
    }

}