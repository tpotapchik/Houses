<?php
/**
 * Created by PhpStorm.
 * User: coxa
 * Date: 24.04.15
 * Time: 21:16
 */

namespace app\assets;


use yii\web\AssetBundle;

class AppExternalAsset  extends AssetBundle
{
    public $sourcePath = null;
    public $basePath = null;
    public $css = [
        '//fonts.googleapis.com/css?family=Roboto:300&subset=cyrillic,latin'
    ];
    public $js = [
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];
}