<?php

require 'vendor/autoload.php';


/**
 * Constantes of project
 */
define('ROOT', __DIR__);
define('CONFIG', ROOT.'/config/');


/**
 * Symfony Dotenv
 */
$dotenv = new Symfony\Component\Dotenv\Dotenv();
$dotenv->load(ROOT.'/.env.prod', ROOT.'/.env.dev');


/**
 * The configuration
 */
$config = \App\Core\Config::getInstance(CONFIG);