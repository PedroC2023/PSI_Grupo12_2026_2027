<?php

declare(strict_types=1);

namespace frontend\assets;

use yii\bootstrap5\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // Apenas ficheiros locais da pasta frontend/web/
        'lib/animate/animate.min.css',
        'lib/owlcarousel/assets/owl.carousel.min.css',
        'lib/lightbox/css/lightbox.min.css',
        'css/bootstrap.min.css',
        'css/style.css',
    ];
    public $js = [
        // Apenas scripts locais da pasta frontend/web/
        'lib/wow/wow.min.js',
        'lib/easing/easing.min.js',
        'lib/waypoints/waypoints.min.js',
        'lib/owlcarousel/owl.carousel.min.js',
        'lib/lightbox/js/lightbox.min.js',
        'js/main.js',
    ];
    public $depends = [
        YiiAsset::class,
        BootstrapPluginAsset::class, // Carrega apenas o JS local do Bootstrap 5 (sem o CSS padrão do Yii)
    ];
}
