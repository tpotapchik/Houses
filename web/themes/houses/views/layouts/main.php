<?php
use app\assets\AppAsset;
use yii\helpers\Html;
/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

$social = Yii::$app->params['social'];
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
    <?= $this->render('_header', ['social' => $social]) ?>
    <?= $this->render('_header-menu', []) ?>


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
                    <a href="<?= $social['youtube'] ?>" class="yt"></a>
                    <a href="<?= $social['gPlus'] ?>" class="gp"></a>
                    <a href="<?= $social['vk'] ?>" class="vk"></a>
                    <a href="<?= $social['fb'] ?>" class="fb"></a>
                </div>

            </div>
        </div>
    </div>
    <div class="back-top"><span></span></div>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
