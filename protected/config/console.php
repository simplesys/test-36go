<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return [
    'basePath' => __DIR__ . DIRECTORY_SEPARATOR . '..',
    'name' => 'Registration form 36go',

    // preloading 'log' component
    'preload' => ['log'],

    'import' => [
        'application.models.*',
        'application.components.*',
    ],

    // application components
    'components' => [
        // database settings are configured in database.php
        'db' =>  require(__DIR__ . '/database.php'),

        'log' => [
            'class' => 'CLogRouter',
            'routes' => [
                [
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ]
            ]
        ]
    ]
];
