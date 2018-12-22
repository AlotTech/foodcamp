<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
      //  'css/site.css',
        'tlogin/vendor/bootstrap/css/bootstrap.min.css',
        'tlogin/vendor/font-awesome/css/font-awesome.min.css',
        'tlogin/vendor/devicons/css/devicons.min.css',
        'tlogin/vendor/simple-line-icons/css/simple-line-icons.css',
        'tlogin/css/resume.css'
    ];
    public $js = [
        'tlogin/vendor/jquery/jquery.min.js',
        'tlogin/vendor/bootstrap/js/bootstrap.bundle.min.js',
        'tlogin/vendor/jquery-easing/jquery.easing.min.js',
        'tlogin/js/resume.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
      //  'yii\bootstrap\BootstrapAsset',
    ];
}
