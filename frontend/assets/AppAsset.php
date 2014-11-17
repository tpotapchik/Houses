<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',
        'http://fonts.googleapis.com/css?family=Roboto:300&subset=cyrillic,latin'
    ];
    public $js = [
        'js/vendor/jquery-migrate-1.2.1.min.js',
        'js/plugins/slick.min.js',
        'js/plugins/chosen.min.js',
        'js/plugins/jquery.fancybox.pack.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
