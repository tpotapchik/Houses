<?php
/**
 * Houses
 * User: coxa
 * Date: 13.11.14
 * Time: 10:23
 */

use yii\widgets\Breadcrumbs;

foreach ($this->params['breadcrumbs'] as $key => $value) {
    if (is_array($this->params['breadcrumbs'][$key])) {
        $this->params['breadcrumbs'][$key]['itemprop'] = 'item';
    }
}

echo Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'tag' => 'div',
    'options' => [
        'class' => 'breadcrums clearfix',
        'itemscope' => '',
        'itemtype' => "http://schema.org/BreadcrumbList"
    ],
    'itemTemplate' => "<span itemprop=\"itemListElement\" itemscope itemtype=\"http://schema.org/ListItem\">{link}</span> - ",
    'activeItemTemplate' => "{link}"
]);
?>