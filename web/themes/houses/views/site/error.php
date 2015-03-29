<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<div class="site-error">

    <h1>К сожалению, запрошенная вами страница не найдена</h1>

    <p>
        Это означает, что страницы, которую вы ищете, больше не существует. <br>
        Возможно, она была удалена, либо вы набрали неправильный адрес.
    </p>
    <p>Вы можете перейти на <?= Html::a('главную страницу', ['site/index']); ?> либо в <?= Html::a('каталог проектов', ['catalog/index']) ?>.</p>
    <p>
        Не повезло в поиске - мы вам поможем!

    </p>
    <div>
    <div class="left"><img src="/img/gift.jpg" alt="Получи бесплатную консультацию"></div>
    <div class="left call_me"><a href="#popup" class="popup">Заказать звонок</a></div>
    </div>


</div>
