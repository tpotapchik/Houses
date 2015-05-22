<?php
/* @var $this yii\web\View */
use app\models\Article;

/** @var app\models\Article $mainArticle */
$mainArticle = Article::getMain();

$this->registerMetaTag(['name' => 'keywords', 'content' => $mainArticle->meta_keywords]);
$this->registerMetaTag(['name' => 'description', 'content' => $mainArticle->meta_description]);
?>

<div class="slider-content">
    <?= $this->render('../layouts/_filter-panel', ['other' => false]) ?>
    <div class="slider">
        <div class="slider-item" style="background-image: url('/img/temp/slider-pic-1.jpg')"> </div>
        <div class="slider-item" style="background-image: url('/img/temp/slider-pic-2.jpg')"></div>
        <div class="slider-item" style="background-image: url('/img/temp/slider-pic-3.jpg')"></div>
        <div class="slider-item" style="background-image: url('/img/temp/slider-pic-4.jpg')"></div>
        <div class="slider-item" style="background-image: url('/img/temp/slider-pic-5.jpg')"></div>
    </div>
</div>

<!--main part-->
<div class="centralize">

    <!-- место для баннеров-->
    <!--<div class="banners-content clearfix">-->
    <!--<div>Место для баннера 1</div>-->
    <!--<div>Место для баннера 2</div>-->
    <!--</div>-->

    <?= $this->render('../layouts/_our-projects', []) ?>

    <?= $this->render('../layouts/_we-suggest', []) ?>

    <?= $this->render('../layouts/_popular', []) ?>

    <?= $this->render('../layouts/_favorite', []) ?>

    <div class="main-block clearfix">
        <div class="right-block right">
            <?= $this->render('../layouts/_newsAnounce', []) ?>
            <?= $this->render('../layouts/_right-menu', []) ?>


        </div>
        <div class="main-text-block ovhidden">
            <?= $mainArticle->full_text ?>
        </div>
    </div>

    <?= $this->render('../layouts/_parthners', []) ?>
</div>
<!--/main part-->