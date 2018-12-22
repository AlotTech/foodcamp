<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class CustomAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
      //'css/site.css',
        'start/vendor/bootstrap/css/bootstrap.min.css',
        'start/vendor/font-awesome/css/font-awesome.min.css',
        'start/vendor/simple-line-icons/css/simple-line-icons.css',
        'start/css/landing-page.css',
        'start/css/infobox.css'
    ];
    public $js = [
        'start/vendor/jquery/jquery.min.js',
        'start/vendor/bootstrap/js/bootstrap.bundle.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
      //'yii\bootstrap\BootstrapAsset',
    ];
}
