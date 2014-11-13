<?php
/**
 * Houses
 * User: coxa
 * Date: 13.11.14
 * Time: 10:23
 */

use yii\widgets\Breadcrumbs;

echo Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'tag' => 'div',
    'options' => [
        'class' => 'breadcrums clearfix'
    ],
    'itemTemplate' => "{link} - ",
    'activeItemTemplate' => "{link}"
]);
?>