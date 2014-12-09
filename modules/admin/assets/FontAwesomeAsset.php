<?php
/**
 * Created by PhpStorm.
 * User: coxa
 * Date: 09.12.14
 * Time: 22:54
 */

namespace app\modules\admin\assets;


use yii\web\AssetBundle;

class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = '@vendor/fortawesome/font-awesome';

    public function init()
    {
        $this->css = YII_DEBUG ? ['css/font-awesome.css'] : ['css/font-awesome.min.css'];
        parent::init();
    }
}