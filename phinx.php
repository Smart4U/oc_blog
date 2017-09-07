<?php

require 'bootstrap.php';

return [

    'paths' => [
        'migrations' => __DIR__ . '/database/migrations',
        'seeds'      => __DIR__ . '/database/seeds'
    ],

    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => 'development',

        'development' => [
            'adapter'    => 'mysql',
            'host'       => getenv('DB_HOST'),
            'name'       => getenv('DB_NAME'),
            'user'       => getenv('DB_USER'),
            'pass'       => getenv('DB_PASS'),
            'port'       => getenv('DB_PORT'),
            'connection' => new PDO(
                'mysql:dbname='.getenv('DB_NAME').';host='.getenv('DB_HOST'), getenv("DB_USER"), getenv("DB_PASS"),
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            )
        ]

    ]

];