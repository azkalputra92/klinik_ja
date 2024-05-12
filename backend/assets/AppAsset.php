<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
        'css/custom.css',
        // 'css/site.css',
        // 'css/custome.css',
        // 'lib/remixicon/fonts/remixicon.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.css',
        'https://fonts.googleapis.com/icon?family=Material+Icons',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.css',
        'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0',
        'vendor/bootstrap/css/bootstrap.min.css',
        'vendor/bootstrap-icons/bootstrap-icons.css',
        'vendor/boxicons/css/boxicons.min.css',
        'vendor/quill/quill.snow.css',
        'vendor/quill/quill.bubble.css',
        'vendor/remixicon/remixicon.css',
        'vendor/simple-datatables/style.css',

   

    ];
    public $js = [
        // 'lib/jquery/jquery.min.js',
        // 'js/menu-expand.js',
        // 'lib/bootstrap/js/bootstrap.bundle.js',
        // 'https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js',
        // 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.3/js/plugins/sortable.min.js',
        // 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.3/themes/fas/theme.min.js'
        'vendor/apexcharts/apexcharts.min.js',
        'vendor/bootstrap/js/bootstrap.bundle.min.js',
        'vendor/chart.js/chart.umd.js',
        'vendor/echarts/echarts.min.js',
        'vendor/quill/quill.js',
        'vendor/simple-datatables/simple-datatables.js',
        'vendor/tinymce/tinymce.min.js',
        'vendor/php-email-form/validate.js',
        'js/main.js',
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
        // '\rmrevin\yii\fontawesome\AssetBundle'
    ];
}