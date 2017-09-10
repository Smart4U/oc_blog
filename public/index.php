<?php

$container = require(dirname(__DIR__) . '/bootstrap.php');

$app = new \App\Core\App($container);

\Http\Response\send($app->run());