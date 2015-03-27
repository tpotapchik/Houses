<?php
use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

if (!isset($model)) {
    $model = new \app\models\CallUsForm();
}
?>

<div class="order-call" id="popup">
    <div class="message">Спасибо! Мы перезвоним вам<br> в ближайшее время.</div>
    <div class="_title">ЗАКАЗАТЬ ЗВОНОК</div>
    <!--open-->
    <?php $form = ActiveForm::begin([
        'action' => ['site/callus'],
        'method' => 'post',
        'id' => 'callUsForm',

    ]); ?><!--open-->
    <div class="form-row">Введите свое имя</div>
    <?= $form->field($model, 'name', [
        'template' => "{input}\n{hint}\n{error}",
        'errorOptions' => [
            'class' => 'error'
        ],
        'inputOptions' => [
            'class' => 'popup-input',
            'placeholder' => 'Введите свое имя',

        ]
    ]) ?>

    <div class="form-row">Введите ваш номер телефона<br><span>+375 (29) 000-00-11, +7 (495) 888-11-88, +380 (25) 111-11-11</span></div>
    <?= $form->field(
        $model,
        'phoneNumber',
        [
            'template' => "{hint}\n{input}\n{error}",
            'errorOptions' => [
                'class' => 'error'
            ],
        ])
        ->widget(
            MaskedInput::className(),
            [
                'mask' => '+9{1,3} (9{2,3}) 999-99-99',
                'options' => [
                    'class' => 'popup-input'
                ]
            ]
        ) ?>

    <div class="form-row">Введите символы с картинки</div>
    <?= $form->field($model, 'verifyCode', [
        'template' => "{hint}\n{input}\n{error}",
        'inputOptions' => [],
        'errorOptions' => [
            'class' => 'error'
        ],
    ])->hint('Чтоб обновить картинку - нажмите на нее')->widget(Captcha::className(), [
        'options' => ['class' => 'popup-input'],
        'imageOptions' => ['class' => 'capcha']
    ]) ?>
    <?= Html::submitButton('ЗАКАЗАТЬ ЗВОНОК', ['class' => 'order-call-btn', 'name' => 'contact-button', 'id' => 'js-submit']) ?>


    <?php ActiveForm::end(); ?>
    <!--close--></div><!--close-->