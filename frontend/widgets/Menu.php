<?php
/**
 * Houses
 * User: coxa
 * Date: 13.11.14
 * Time: 1:13
 */

namespace frontend\widgets;


use yii\base\Widget;
use yii\helpers\Html;

class Menu extends Widget {

    public $items = [];

    public function run()
    {
        $result = '';

        $result .= Html::beginTag('div', [
            'class' => 'header-menu'
        ]);
        $result .= Html::beginTag('div', [
            'class' => 'centralize clearfix'
        ]);

        foreach ($this->items as $key => $url) {
            $result .= Html::a($key, $url, [
                'class' => 'header-menu-item'
            ]);
        }

        $result .= Html::endTag('div');
        $result .= Html::endTag('div');

        return $result;

//        <a href="#" class="header-menu-item active">Главная</a>
//        <a href="about.html" class="header-menu-item">О нас</a>
//        <a href="catalog.html" class="header-menu-item">Каталог проектов</a>
//        <a href="design.html" class="header-menu-item">Дизайн интерьеров</a>
//        <a href="news.html" class="header-menu-item">Новости</a>
//        <a href="map.html" class="header-menu-item">Контакты</a>
//
    }
}
