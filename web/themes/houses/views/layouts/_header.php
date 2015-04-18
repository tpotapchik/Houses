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
?>

<div class="header">
    <div class="centralize">
        <a href="<?= Yii::$app->homeUrl ?>" class="logo"><img src="/img/logo3.png" alt="<?=Yii::$app->params['projectName']?>"/></a>

        <div class="call-back right">
            <div class="social">
                <a rel="nofollow" href="<?= $social['youtube'] ?>" target="_blank" class="yt"></a>
                <a rel="nofollow" href="<?= $social['gPlus'] ?>" target="_blank" class="gp"></a>
                <a rel="nofollow" href="<?= $social['vk'] ?>" target="_blank" class="vk"></a>
                <a rel="nofollow" href="<?= $social['fb'] ?>" target="_blank" class="fb"></a>
             </div>
            <div class="call_me"><a href="#popup" class="popup">Заказать звонок</a></div>
        </div>
        <div class="contact right">
            <a class="mail" href="mailto:<?= $contacts['email'] ?>"><i class="_ico"></i><?= $contacts['email'] ?></a>
            <a class="skype" href="skype:<?= $contacts['skype'] ?>"><i class="_ico"></i><?= $contacts['skype'] ?></a>
        </div>
        <div class="phone right">
                    <div class="_ico_"></div>
        <table style="margin-top:-20px;">
        <tr><td>
            <img src="/img/24-7.jpg" width="80" />
</td>
<td>
            <p>
                <a style="color:#434242; text-decoration: none;" href="tel:<?= Yii::$app->params['contacts']['phone1'] ?>"><?= Yii::$app->params['contacts']['phone1'] ?></a>
            </p>
            <?php
            /*
             * IF you want to change any contact lets go to ../config/params.php
             * PLEASE DO NOT TOUCH ANY PHP EXPRESSIONS LIKE <?= $contacts['email'] ?> OR <?= $contacts['phone'] ?>
             */
            ?>
            <p>
                <a style="color:#434242; text-decoration: none;" href="tel:<?= Yii::$app->params['contacts']['phone2'] ?>"><?= Yii::$app->params['contacts']['phone2'] ?></a>
            </p>
            </td></tr>
            </table>
        </div>
    </div>
</div>

<?= $this->render('_callus') ?>


