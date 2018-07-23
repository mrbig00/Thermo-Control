<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id'                  => 'thermo-control-console',
    'basePath'            => dirname(__DIR__) . '/src',
    'runtimePath'         => dirname(__DIR__) . '/runtime/console',
    'vendorPath'          => dirname(__DIR__) . '/vendor',
    'controllerNamespace' => 'app\commands',
    'bootstrap'           => ['log'],
    'controllerMap'       => [
        'migrate' => [
            'class'               => \yii\console\controllers\MigrateController::class,
            'migrationPath'       => [
                '@yii/rbac/migrations',
            ],
            'migrationNamespaces' => [
                'Da\User\Migration',
                'app\migrations',
                'app\migrations\demo',
            ],
        ],
        'stubs'   => [
            'class' => 'bazilio\stubsgenerator\StubsController',
        ],
    ],
    'aliases'             => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components'          => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'cache'       => [
            'class' => 'yii\caching\FileCache',
        ],
        'log'         => [
            'targets' => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db'          => $db,
        'mailer'      => [
            'class'            => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
    ],
    'params'              => $params,
    'modules'             => [
        'user' => [
            'class' => Da\User\Module::class,
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
