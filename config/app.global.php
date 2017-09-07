<?php

$debug = (getenv('APP_ENV') === 'dev') ? true : false;

return [
    'debug' => $debug,
    'domain' => getenv('APP_HOST'),
];