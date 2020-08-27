<?php

/**
 * This is the parameters file used on the "prod" environment (production)
 */

return [
    'atk' => [

        'identifier' => 'atk-skeleton-prod', // CHANGE ME!


        'db' => [
            'default' => [
                'host' => 'localhost',
                'db' => 'marketing',
                'user' => 'marketing',
                'password' => 'marketing',
                'charset' => 'utf8',
                'driver' => 'MySqli',
            ],
        ],

        'debug' => 0,
        'meta_caching' => false,
        'auth_ignorepasswordmatch' => false,
        'administratorpassword' => '$2y$10$UPd9H1tISq5BJf93qRCy7eLZsbH/0cbOvT/ucM07n10hlqGn7kvqy', // administrator
    ],
];