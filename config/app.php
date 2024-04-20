<?php

use function DI\env;

return [
    'migration_dirs' => [
        'first' => env('MIGRATION_DIR', __DIR__ . '/database/migrations'),

    ],
    'environments' => [
        'local' => [
            'adapter' => env("DB_ADAPTER", 'mysql'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', 3306), // optional
            'username' => env('DB_USER', 'root'),
            'password' => env('DB_PASS', 'root'),
            'db_name' => env('DB_NAME', 'my_local_db'),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_general_ci'),
        ],
        'production' => [
            'adapter' => 'mysql',
            'host' => 'production_host',
            'port' => 3306, // optional
            'username' => 'user',
            'password' => 'pass',
            'db_name' => 'my_production_db',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_general_ci', // optional, if not set default collation for utf8mb4 is used
        ],
    ],
    'default_environment' => env("APP_ENV", 'local'),
    'log_table_name' => '',
];
