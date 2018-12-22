<?php
namespace frontend\assets;

use yii\web\AssetBundle;

class FormAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
     //   'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Varela+Round',
        //'home/bootstrap/css/bootstrap.min.css',
        'home/fonts/font-awesome.css',
        //'home/css/selectize.css',
        'home/css/style_form.css',
        //'home/css/user.css',
    ];
    public $js = [
        //'home/js/jquery-3.3.1.min.js',
        //'home/js/popper.min.js',
        //'home/bootstrap/js/bootstrap.min.js',
        //'home/js/selectize.min.js',
        //'home/js/masonry.pkgd.min.js',
        //'home/js/icheck.min.js',
        //'home/js/jquery.validate.min.js',
        //'home/js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
