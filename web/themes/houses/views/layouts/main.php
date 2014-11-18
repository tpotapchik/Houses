<?php
use app\assets\AppAsset;
use yii\helpers\Html;
/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html lang="<?= Yii::$app->language ?>" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html lang="<?= Yii::$app->language ?>" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html lang="<?= Yii::$app->language ?>" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="<?= Yii::$app->language ?>" class="no-js"> <!--<![endif]-->
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="page">
    <div class="page_i">
    <?= $this->render('_header', []) ?>
    <?= $this->render('_header-menu', []) ?>

    <div class="order-call" id="popup">
        <div class="message">Спасибо! Мы перезвоним вам<br> в ближайшее время.</div>
        <div class="_title">ЗАКАЗАТЬ ЗВОНОК</div>
        <form action="#" method="post">
            <div class="form-row">Введите свое имя</div>
            <input type="text" class="popup-input" placeholder="Введите свое имя"/>
            <div class="form-row">Введите ваш номер телефона<br><span>+375 (29) 000-00-11, +7 (495) 888-11-88, +380 (25) 111-11-11</span>
            </div>
            <input type="tel" class="popup-input" placeholder="Введите ваш номер телефона"/>
            <button type="submit" id="js-submit" class="order-call-btn">ЗАКАЗАТЬ ЗВОНОК</button>


        </form>

    </div>
    <!--end HEADER-->

    <?= $content ?>


    </div>
    </div>

    <div class="footer">

        <?= \app\widgets\FooterMenu::widget(Yii::$app->params['mainMenu']) ?>

        <div class="footer-bottom">
            <div class="centralize">
                <span class="copyright">
                    <?= date('Y') ?> &copy; Все права защищены
                </span>

                <div class="footer-social">
                    <a href="http://facebook.com" class="fb"></a>
                    <a href="http://twitter.com" class="tw"></a>
                    <a href="http://linkedin.com" class="in"></a>
                    <a href="http://vk.com" class="vk"></a>
                    <a href="http://odnoklassniki.ru" class="ok"></a>
                    <a href="http://youtube.com" class="yt"></a>
                </div>

            </div>
        </div>
    </div>
    <div class="back-top"><span></span></div>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
