<?php

use kartik\datecontrol\Module;
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin'],
            'enableFlashMessages' => false,
        ],
        'datecontrol' => [
            'class' => 'kartik\datecontrol\Module',
            // format settings for displaying each date attribute
            'displaySettings' => [
                Module::FORMAT_DATE => 'dd-MM-yyyy',
                Module::FORMAT_TIME => 'H:mm:ss a',
                Module::FORMAT_DATETIME => 'dd-MM-yyyy HH:mm:ss a',
            ],
            // format settings for saving each date attribute
            /*'saveSettings' => [
            Module::FORMAT_DATE  => 'Y-m-d',
            Module::FORMAT_TIME=> 'H:i:s',
            Module::FORMAT_DATETIME  => 'Y-m-d H:i:s',
            ],*/
            'saveSettings' => [
                Module::FORMAT_DATE => 'yyyy-MM-dd', // saves as unix timestamp
                Module::FORMAT_TIME => 'H:i:s',
                Module::FORMAT_DATETIME => 'Y-m-d H:i:s',
            ],
            'autoWidgetSettings' => [
                Module::FORMAT_DATE => ['type' => 2, 'pluginOptions' => ['autoclose' => true]], // example
                Module::FORMAT_DATETIME => [], // setup if needed
                Module::FORMAT_TIME => [], // setup if needed
            ],
            'displayTimezone' => 'Asia/Jakarta',
            // use ajax conversion for processing dates from display format to save format.
            'ajaxConversion' => true,
            'displayTimezone' => 'GMT+7',
            'saveTimezone' => 'GTM+7',
            // automatically use kartik\widgets for each of the above formats
            'autoWidget' => true,
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

           'assetManager' => [
            'bundles' => [
                'dosamigos\google\maps\MapAsset' => [
                    'options' => [
                        'key' => 'AIzaSyCpVQViQfuRHNN3PWd8ORjPhXh3vK6-XdM',
                        'libraries' => 'places',
                        'v' => '3.exp',
                        'sensor'=> 'false'
                    ]
                ]
            ]
        ],
    ],
];
