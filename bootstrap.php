<?php

require 'vendor/autoload.php';


/**
 * Constantes of project
 */
define('ROOT', __DIR__.'/');
define('CONFIG', ROOT.'config/');
define('STORAGE', ROOT.'storage/');
define('VIEWS', ROOT.'resources/views/');


/**
 * Symfony Dotenv
 */
$dotenv = new Symfony\Component\Dotenv\Dotenv();
$dotenv->load(ROOT.'.env.prod', ROOT.'.env.dev');


/**
 * Dependency injection container
 */
$kernel = require ROOT.'kernel.php';

$builder = new DI\ContainerBuilder();
$builder->addDefinitions($kernel);

foreach ($kernel['bundles'] as $bundle) {
    if($bundle::INIT_BUNDLE){
        $bundle = require($bundle::INIT_BUNDLE);
        $builder->addDefinitions($bundle);
    }
}

return $builder->build();