<?php


namespace App\Bundles\Contact;


use App\Core\Bundle\BaseBundle;
use App\Core\Routing\Router;

/**
 * Class ContactBundle
 * @package App\Bundles\Contact
 */
class ContactBundle extends BaseBundle
{

    const BUNDLE_NAME = 'contact';
    const INIT_BUNDLE = __DIR__ .'/settings.php';

    /**
     * ContactBundle constructor.
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        parent::__construct($router);
        $this->loadSettingsBundle(static::INIT_BUNDLE);
    }
}