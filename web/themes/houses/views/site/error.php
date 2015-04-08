<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<div class="site-error">
    <div class="centralize clearfix">

        <h1>К сожалению, запрошенная вами страница не найдена</h1>
                <p><small>Это означает, что страницы, которую вы ищете, больше не существует. <br>
                    Возможно, она была удалена, либо вы набрали неправильный адрес.</small></p>
                <p><img src="http://dom-tut.by/img/error-bg.png"></p>
                <p>Не повезло в поиске - повезет со скидкой!</p>
                    <img src="http://dom-tut.by/img/error-bonus.png" width="200px">
                <div class="call_me_error">
                    <a href="#popup" class="popup" style="width:300px">Заказать бесплатный звонок!</a>
        	</div>
    </div>

</div>
