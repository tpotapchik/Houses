<?php
/**
 * Created by PhpStorm.
 * User: coxa
 * Date: 09.12.14
 * Time: 22:52
 */

namespace app\modules\admin\assets;


use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
//    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $sourcePath = '@app/modules/admin/src';
    public $css = ['css/sb-admin-2.css'];
    public $js = ['js/sb-admin-2.js', 'js/plugins/metisMenu/metisMenu.min.js'];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'app\modules\admin\assets\FontAwesomeAsset'
    ];
} 