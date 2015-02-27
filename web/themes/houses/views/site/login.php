<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<center>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <br />
                    Забыли пароль? <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<br/><br/><br/>
<!--LiveInternet logo--><a href="http://www.liveinternet.ru/stat/dom-tut.by/index.html"
target="_blank"><img src="//counter.yadro.ru/logo?52.6"
title="LiveInternet: показано число просмотров и посетителей за 24 часа"
alt="" border="0" width="88" height="31"/></a><!--/LiveInternet-->
</center>