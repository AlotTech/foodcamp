<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules'=>[
         'gridview' => [
            'class' => 'kartik\grid\Module',
        ],
    ],
    'homeUrl' => '/foodcamp',
    'components' => [
        'geoip2' => [
            'class' => 'overals\GeoIP2\GeoIP2',
            'mmdb' => '@frontend/components/GeoIP2/GeoLite2-City.mmdb',
            'lng' => 'en', // available languages = 'de', 'en', 'es', 'ja', 'ru', 'zh-CN'
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@vendor/almasaeed2010/adminlte/pages',

                ],

            ],
        ],
        'request' => [
            'baseUrl' => '/foodcamp',
            'csrfParam' => '_csrf-frontend',
        ],
        'assetManager' => [
            'bundles' => [
            ],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'urlManagerBackend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => 'backend/web/uploads/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],

    ],
    'params' => $params,
];
