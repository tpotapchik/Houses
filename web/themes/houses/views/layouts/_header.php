<?php
/**
 * Houses
 * User: coxa
 * Date: 13.11.14
 * Time: 0:26
 */

use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

$contacts = Yii::$app->params['contacts'];
if (!isset($model)) {
    $model = new \app\models\CallUsForm();
}
?>
<div class="header">
    <div class="centralize">
        <a href="<?= Yii::$app->homeUrl ?>" class="logo"><img src="/img/logo3.png" alt="Логотип"/></a>

        <div class="call-back right">
            <div class="social">
                <a rel="nofollow" href="https://www.youtube.com/channel/UCg34LYTRug0x8hNVbjbeZ3A" target="_blank" class="yt"></a>
                <a rel="nofollow" href="https://plus.google.com/u/0/108290869583672576270/posts" target="_blank" class="gp"></a>
                <a rel="nofollow" href="http://vk.com/dom_tut" target="_blank" class="vk"></a>
                <a rel="nofollow" href="https://www.facebook.com/pages/Проектная-мастерская-Дом-Тутby/1602271246672110" target="_blank" class="fb"></a>
             </div>
            <div class="call_me"><a href="#popup" class="popup">Заказать звонок</a></div>
        </div>
        <div class="contact right">
            <a class="mail" href="mailto:<?= $contacts['email'] ?>"><i class="_ico"></i><?= $contacts['email'] ?></a>
            <a class="skype" href="skype:dom-tut.by<?//= $contacts['skype'] ?>"><i class="_ico"></i>dom-tut.by<?//= $contacts['skype'] ?></a>
        </div>
        <div class="phone right">
            <div class="_ico"></div>
<table>
<tr>
<td>+375 17</td>
<td rowspan="2"><font style="font-size:35px; padding-left:15px;">677-10-59</font></td>
</tr>
<tr>
<td>+375 29</td>
</tr>
</table>
        </div>
    </div>
</div>

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
        'options' => ['class' => 'popup-input',]
    ]) ?>
    <?= Html::submitButton('ЗАКАЗАТЬ ЗВОНОК', ['class' => 'order-call-btn', 'name' => 'contact-button', 'id' => 'js-submit']) ?>


<?php ActiveForm::end(); ?>
<!--close--></div><!--close-->


