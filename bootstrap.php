<?php

require 'vendor/autoload.php';


/**
 * Constantes of project
 */
define('ROOT', __DIR__.'/');
define('CONFIG', ROOT.'config/');
define('STORAGE', ROOT.'storage/');


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

return $builder->build();