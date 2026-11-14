<?php

/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

declare(strict_types=1);

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://googleapis.com',
        'https://fontawesome.com',
        'https://jsdelivr.net',
        'lib/animate/animate.min.css',
        'lib/owlcarousel/assets/owl.carousel.min.css',
        'lib/lightbox/css/lightbox.min.css',
        'css/bootstrap.min.css',
        'css/style.css',
    ];
    public $js = [
        'https://jsdelivr.net',
        'lib/wow/wow.min.js',
        'lib/easing/easing.min.js',
        'lib/waypoints/waypoints.min.js',
        'lib/owlcarousel/owl.carousel.min.js',
        'lib/lightbox/js/lightbox.min.js',
        'js/main.js',
    ];
    public $depends = [
        YiiAsset::class,
    ];
}
