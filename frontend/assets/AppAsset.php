<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/style.css',
        'css/responsive.css',
        'css/jquery.mCustomScrollbar.min.css',
        'https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css',
    ];
    public $js = [
        'js/jquery.min.js',
        'js/popper.min.js',
        'js/bootstrap.bundle.min.js',
        'js/jquery-3.0.0.min.js',
        'js/plugin.js',
        'js/jquery.mCustomScrollbar.concat.min.js',
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap5\BootstrapAsset',
        // 'yii\bootstrap5\BootstrapPluginAsset'
    ];
}
