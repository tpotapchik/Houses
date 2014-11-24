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
        <a href="<?= Yii::$app->homeUrl ?>" class="logo"><img src="/img/logo.png" alt="Логотип"/></a>

        <div class="call-back right">
            <div class="social">
                <a href="http://youtube.com" class="yt"></a>
                <a href="http://vk.com" class="vk"></a>
                <a href="http://facebook.com" class="fb"></a>
            </div>
            <div class="call_me"><a href="#popup" class="popup">Заказать звонок</a></div>
        </div>
        <div class="contact right">
            <a class="mail" href="mailto:<?= $contacts['email'] ?>"><i class="_ico"></i><?= $contacts['email'] ?></a>
            <a class="skype" href="skype:<?= $contacts['skype'] ?>"><i class="_ico"></i><?= $contacts['skype'] ?></a>
        </div>
        <div class="phone right">
            <div class="_ico"></div>
            <p><?= $contacts['phone1'] ?></p>

            <p><?= $contacts['phone2'] ?></p>
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
    <?= Html::activeTextInput($model, 'name', [
        'class' => 'popup-input',
        'placeholder' => 'Введите свое имя'
    ]) ?>

    <div class="form-row">Введите ваш номер телефона<br><span>+375 (29) 000-00-11, +7 (495) 888-11-88, +380 (25) 111-11-11</span></div>
        <?= $form->field($model, 'phoneNumber', ['template' => '{input}',])->widget(MaskedInput::className(), [
            'mask' => '+9{1,3} (9{2,3}) 999-99-99',
            'options' => [
                'class' => 'popup-input'
            ]
        ]) ?>

    <div class="form-row">Введите символы с картинки</div>
    <?= $form->field($model, 'verifyCode', [
        'template' => '{input}',
        'inputOptions' => []
    ])->widget(Captcha::className(), [
        'options' => ['class' => 'popup-input',]
    ]) ?>
<!--        <button type="submit" id="js-submit" class="order-call-btn">ЗАКАЗАТЬ ЗВОНОК</button>-->
    <?= Html::submitButton('ЗАКАЗАТЬ ЗВОНОК', ['class' => 'order-call-btn', 'name' => 'contact-button', 'id' => 'js-submit']) ?>


<?php ActiveForm::end(); ?>
<!--close--></div><!--close-->


