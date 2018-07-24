<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$config = [
    'id'          => 'thermo-control',
    'name'        => 'Thermo Control',
    'timezone'    => 'Europe/Bucharest',
    'basePath'    => dirname(__DIR__) . '/src',
    'runtimePath' => dirname(__DIR__) . '/runtime/web',
    'vendorPath'  => dirname(__DIR__) . '/vendor',
    'bootstrap'   => ['log'],
    'aliases'     => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components'  => [
        'authManager'  => [
            'class' => 'yii\rbac\DbManager',
        ],
        'request'      => [
            'cookieValidationKey' => 'JTvogpef0WTO2g4X0BMfFWBHXWImLDLn',
        ],
        'cache'        => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db'           => $db,
        'urlManager'   => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules'           => [
            ],
        ],
        'mailer'       => [
            'class'            => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
        'view'         => [
            'theme' => [
                'pathMap' => [
                    '@Da/User/resources/views' => '@app/views/user',
                ],
            ],
        ],
    ],
    'modules'     => [
        'user' => [
            'class'         => Da\User\Module::class,
            'viewPath'      => '@app/views/user',
            'classMap'      => [
                'User'      => 'app\models\User',
            ],
            'controllerMap' => [
                'security'     => 'app\controllers\user\SecurityController',
                'registration' => 'app\controllers\user\RegistrationController',
            ],
        ],
    ],
    'params'      => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
