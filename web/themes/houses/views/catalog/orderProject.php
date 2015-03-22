<?php

/* @var $this yii\web\View */
use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Как заказать проект ';
$this->params['breadcrumbs'][] = ['label' => Yii::t('house', 'Catalog Projects'), 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = $this->title;

Yii::$app->params['mainMenu']['items'][2]['active'] = true;
?>

<?= $this->render('../layouts/_filter-panel', ['other' => true]) ?>

<!--main part-->
<div class="centralize">

    <?= $this->render('../layouts/_breadcrumbs', []) ?>

    <div class="main-title">ЗАКАЗАТЬ ТИПОВОЙ ПРОЕКТ</div>
    <div class="main-block clearfix">
        <div class="right-block right">
            <?= $this->render('../layouts/_right-menu', []) ?>
        </div>
        <div class="main-text-block ovhidden">
            <?= /** @var \app\models\Article $article */
            $article->full_text ?>
        </div>
        <div class="feedback-block-wrapper">
            <div class="feedback-block">
                <div class="message">Спасибо! Мы свяжемся с вами<br> в ближайшее время.</div>
                <div class="_title">ФОРМА ОБРАТНОЙ СВЯЗИ</div>

                <?php $form = ActiveForm::begin([
                    'method' => 'post',
                    'enableClientValidation' => true,
                ]); ?>
                <div class="form-row">Введите свое имя</div>
                <?= $form->field($model, 'name', [
                    'template' => "{input}\n{hint}\n{error}",
                    'errorOptions' => [
                        'class' => 'error'
                    ],
                    'inputOptions' => [
                        'class' => 'popup-input',
                        'placeholder' => 'Вася',

                    ]
                ]) ?>

                <div class="form-row">Введите тему сообщения</div>
                <?= $form->field($model, 'subject', [
                    'template' => "{input}\n{hint}\n{error}",
                    'errorOptions' => [
                        'class' => 'error'
                    ],
                    'inputOptions' => [
                        'class' => 'popup-input',
                        'placeholder' => 'Хочу сотрудничать'
                    ]
                ]) ?>

                <div class="form-row">Введите ваш электронный адрес</div>
                <?= $form->field($model, 'email', [
                    'template' => "{input}\n{hint}\n{error}",
                    'errorOptions' => [
                        'class' => 'error'
                    ],
                    'inputOptions' => [
                        'class' => 'popup-input',
                        'placeholder' => 'vasya@fake-site.com'
                    ]
                ]) ?>

                <div class="form-row">Напишите комментарий</div>
                <?= $form->field($model, 'body', [
                    'template' => "{input}\n{hint}\n{error}",
                    'errorOptions' => [
                        'class' => 'error'
                    ],
                    'inputOptions' => [
                        'class' => 'popup-textarea',
                        'cols' => '30',
                        'rows' => '10'
                    ]
                ])->textArea() ?>

                <div class="form-row">Введите символы с картинки</div>
                <?= $form->field($model, 'verifyCode', [
                    'template' => "{hint}\n{input}\n{error}",
                    'inputOptions' => [],
                    'errorOptions' => [
                        'class' => 'error'
                    ],
                ])->hint('Чтоб обновить картинку - нажмите на нее')->widget(Captcha::className(), [
                    'options' => ['class' => 'popup-input',],
                    'imageOptions' => ['class' => 'capcha']
                ]) ?>
                <?= Html::submitButton('ОТПРАВИТЬ', ['class' => 'order-call-btn', 'name' => 'contact-button', 'id' => 'js-submit']) ?>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>

    <?= $this->render('../layouts/_our-projects', []) ?>

    <?= $this->render('../layouts/_parthners', []) ?>
</div>
