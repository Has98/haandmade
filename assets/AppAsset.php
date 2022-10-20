<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/font-awesome/css/font-awesome.min.css',
        'css/owl.carousel.css',
        'css/owl.carousel.min.css',
        'css/owl.theme.default.min.css',
        'css/animate.css',
        'css/docs.theme.min.css',
        'css/site.css',

        'css/theme.css',

    ];
    public $js = [
        // 'js/jquery-3.3.1.min.js',
        'js/jquery.min.js',

        'js/owl.carousel.js',
        'js/owl.carousel.min.js',
        'js/bootstrap.min.js',
        'js/site.js',
        'js/jquery.maskedinput.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
