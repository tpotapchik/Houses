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
    <div class="centralize clearfix">
        <a href="<?= Yii::$app->homeUrl ?>" class="logo left"><img src="/img/logo5.png" alt="<?=Yii::$app->params['projectName']?>" width="164" height="59" /></a>

        <!--<div class="call-back right">
            <div class="social">
                <a rel="nofollow" href="<?= $social['youtube'] ?>" target="_blank" class="yt"></a>
                <a rel="nofollow" href="<?= $social['gPlus'] ?>" target="_blank" class="gp"></a>
                <a rel="nofollow" href="<?= $social['vk'] ?>" target="_blank" class="vk"></a>
                <a rel="nofollow" href="<?= $social['fb'] ?>" target="_blank" class="fb"></a>
             </div>
            <div class="call_me"><a href="#popup" class="popup">Заказать звонок</a></div>
        </div>-->
        <!--<div class="contact right">
            <a class="mail" href="mailto:<?= $contacts['email'] ?>"><i class="_ico"></i><?= $contacts['email'] ?></a>
            <a class="skype" href="skype:<?= $contacts['skype'] ?>"><i class="_ico"></i><?= $contacts['skype'] ?></a>
        </div>-->
        <div class="phone left">
                    <div class="_ico_"></div>
                    <p>898 897 987</p>
                     <p>898 897 987</p>




        <!--<table style="margin-top:-20px;">
        <tr><td>
        Работаем без выходных
            <img src="/img/24-7.jpg" width="80" />
</td>
<td>
               <a style="color:#434242; text-decoration: none;" href="tel:<?= Yii::$app->params['contacts']['phone1'] ?>"><?= Yii::$app->params['contacts']['phone1'] ?></a>
            <?php
            /*
             * IF you want to change any contact lets go to ../config/params.php
             * PLEASE DO NOT TOUCH ANY PHP EXPRESSIONS LIKE <?= $contacts['email'] ?> OR <?= $contacts['phone'] ?>
             */
            ?>
            <br/>
                <a style="color:#434242; text-decoration: none;" href="tel:<?= Yii::$app->params['contacts']['phone2'] ?>"><?= Yii::$app->params['contacts']['phone2'] ?></a>
            </td></tr>
            </table>-->
        </div>


           <?= $this->render('_header-menu', []) ?>
    </div>
</div>

<?= $this->render('_callus') ?>


