<?php

return [
    'basePath' => __DIR__ . DIRECTORY_SEPARATOR . '..',
    'name' => 'Запись на приём к врачу',

    'preload' => ['log'],

    // autoloading model and component classes
    'import' => [
        'application.models.*',
        'application.components.*',
    ],

    'modules' => [
        'gii' => [
            'class' => 'system.gii.GiiModule',
            'password' => '12345'
        ]
    ],

    // application components
    'components' => [
        'user' => ['allowAutoLogin' => true],

        'urlManager' => [
            'class' => 'CUrlManager',
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>'
            ]
        ],

        'db' =>  require(dirname(__FILE__) . '/database.php'),

        'errorHandler' => [
            'errorAction' => YII_DEBUG ? null : 'site/error',
        ],

        'log' => [
            'class' => 'CLogRouter',
            'routes' => [
                [
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ],
            ]
        ]
    ],

    'params' => [
        'adminEmail' => 'webmaster@example.com',
    ]
];
