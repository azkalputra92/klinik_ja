<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '//fonts.googleapis.com/css?family=Inter:300,400,500,600,700',
        'css/plugins.bundle.css',
        'css/fullcalendar.bundle.css',
        'css/style.bundle.css',
        'css/style.css',
        'css/datatables.bundle.css',
    ];
    public $js = [
        // 'js/plugins.bundle.js',
        // '/js/apexcharts.min.js',
        // '/js/dashboard-admin.js',

        'js/popper.min.js',
        'js/scripts.bundle.js',
        'js/script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
        'yii\bootstrap5\BootstrapPluginAsset'
    ];
}
