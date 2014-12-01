<?php
/**
 * Houses
 * User: coxa
 * Date: 13.11.14
 * Time: 0:56
 */
/* @var $this \yii\web\View */
?>
<div class="main-title">НАШИ ПРОЕКТЫ ДОМОВ</div>
<div class="main-block projects-house clearfix">
    <div class="_content left">
        <a href="<?= \yii\helpers\Url::toRoute(['catalog/index']) ?>" class="picture-block">
            <div class="_title">ВСЕ ПРОЕКТЫ</div>
            <img src="/img/temp/house1.jpg" alt="Картинка дома"/>

            <div class="_more-button">
                <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
            </div>
        </a>
    </div>
    <div class="_content right">
        <?php
            $panel = new \app\models\FilterPanel();
            $panel->effectiveAreaTo = 100;
        ?>
        <a href="<?= \yii\helpers\Url::toRoute(['catalog/search', $panel->formName() => $panel->getAttributes()]) ?>" class="picture-block">
            <div class="_title">ДОМА ДО 100 м<sup>2</sup></div>
            <img src="/img/temp/house1.jpg" alt="Картинка дома"/>

            <div class="_more-button">
                <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
            </div>
        </a>
    </div>
    <div class="_content left">
        <?php
        $panel->effectiveAreaFrom = 100;
        $panel->effectiveAreaTo = 180;
        ?>
        <a href="<?= \yii\helpers\Url::toRoute(['catalog/search', $panel->formName() => $panel->getAttributes()]) ?>" class="picture-block">
            <div class="_title">СРЕДНИЕ ДОМА ДО 100-180 м<sup>2</sup></div>
            <img src="/img/temp/house1.jpg" alt="Картинка дома"/>

            <div class="_more-button">
                <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
            </div>
        </a>
    </div>
    <div class="_content right">
        <?php
        $panel->effectiveAreaFrom = 180;
        $panel->effectiveAreaTo = null;
        ?>
        <a href="<?= \yii\helpers\Url::toRoute(['catalog/search', $panel->formName() => $panel->getAttributes()]) ?>" class="picture-block">
            <div class="_title">БОЛЬШИЕ ДОМА БОЛЕЕ 180 м<sup>2</sup></div>
            <img src="/img/temp/house1.jpg" alt="Картинка дома"/>

            <div class="_more-button">
                <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
            </div>
        </a>
    </div>
</div>