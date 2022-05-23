<?php
use skobka\yii2\migrationGenerator\Controllers\MigrationGeneratorController;
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
    ],
    'params' => $params,

    'controllerMap' => [
//        'fixture' => [ // Fixture generation command line.
//            'class' => 'yii\faker\FixtureController',
//        ],
        'migration' => [
            'class' => MigrationGeneratorController::class,
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'allowedIPs' => ['*'],
        'class' => 'yii\gii\Module',
//        'generators' => [
//            'migrik'=>[
//                'class'=>\insolita\migrik\gii\StructureGenerator::class,
//                'templates'=>
//                    [
//                        'custom'=>'@backend/gii/templates/migrator_schema'
//                    ]
//            ],
//            'migrikdata'=>[
//                'class'=>\insolita\migrik\gii\DataGenerator::class,
//                'templates'=>
//                    [
//                        'custom'=>'@backend/gii/templates/migrator_data'
//                    ]
//            ],
//        ]
    ];
}

return $config;
