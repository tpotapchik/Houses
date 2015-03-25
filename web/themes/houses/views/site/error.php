<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<div class="site-error">

    <h1>404</h1>

    <div class="alert alert-danger">
        Страница не найдена
    </div>

    <p>
        Это означает, что страницы, которую вы ищете, больше не существует. <br>
        Возможно, она была удалена, либо вы набрали неправильный адрес.
    </p>
    <p>Вы можете перейти на <a href="/index">главную страницу</a> либо в <a href="/catalog">каталог проектов</a>.</p>
    <p>
        Мы можем перезвонить Вам сами:

    </p>
    <div class="call_me"><a href="#popup" class="popup">Заказать звонок</a></div>

</div>
