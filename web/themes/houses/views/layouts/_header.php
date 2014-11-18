<?php
/**
 * Houses
 * User: coxa
 * Date: 13.11.14
 * Time: 0:26
 */

$contacts = Yii::$app->params['contacts'];
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