<?php
/**
 * Houses
 * User: coxa
 * Date: 13.11.14
 * Time: 0:56
 */
use app\models\ProjectSearch;
use yii\helpers\Html;

/* @var $this \yii\web\View */


$projectSearch = new ProjectSearch();
$panel = new \app\models\FilterPanel();
?>

<div class="main-title stop-element">НАШИ ПРОЕКТЫ ДОМОВ</div>
<div class="main-block projects-house clearfix">
    <div class="_content">
        <a href="<?= \yii\helpers\Url::toRoute(['catalog/index']) ?>" class="picture-block">
            <div class="_title">ВСЕ ПРОЕКТЫ</div>
            <?php
            $project = $projectSearch->searchOneRandomByFilter(new \app\models\FilterPanel());
            $photoLink = $project->getMainPhoto(492, 369);
            ?>
            <?= Html::img($photoLink, ['alt' => $project->title, 'style' => 'width: 100%; height: auto;']) ?>

            <div class="_more-button">
                <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
            </div>
        </a>
    </div>
    <div class="_content">
        <?php
            $panel->effectiveAreaTo = 100;
            $project = $projectSearch->searchOneRandomByFilter($panel);
            $photoLink = $project->getMainPhoto(492, 369);
        ?>
        <a href="<?= \yii\helpers\Url::toRoute(['catalog/search', $panel->formName() => $panel->getAttributes()]) ?>" class="picture-block">
            <div class="_title">ДОМА ДО 100 м<sup>2</sup></div>
            <?= Html::img($photoLink, ['alt' => $project->title, 'style' => 'width: 100%; height: auto;']) ?>

            <div class="_more-button">
                <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
            </div>
        </a>
    </div>
    <div class="_content">
        <?php
        $panel->effectiveAreaFrom = 100;
        $panel->effectiveAreaTo = 180;
        $project = $projectSearch->searchOneRandomByFilter($panel);
        $photoLink = $project->getMainPhoto(492, 369);
        ?>
        <a href="<?= \yii\helpers\Url::toRoute(['catalog/search', $panel->formName() => $panel->getAttributes()]) ?>" class="picture-block">
            <div class="_title">СРЕДНИЕ ДОМА ДО 100-180 м<sup>2</sup></div>
            <?= Html::img($photoLink, ['alt' => $project->title, 'style' => 'width: 100%; height: auto;']) ?>

            <div class="_more-button">
                <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
            </div>
        </a>
    </div>
    <div class="_content">
        <?php
        $panel->effectiveAreaFrom = 180;
        $panel->effectiveAreaTo = null;
        $project = $projectSearch->searchOneRandomByFilter($panel);
        $photoLink = $project->getMainPhoto(492, 369);
        ?>
        <a href="<?= \yii\helpers\Url::toRoute(['catalog/search', $panel->formName() => $panel->getAttributes()]) ?>" class="picture-block">
            <div class="_title">БОЛЬШИЕ ДОМА БОЛЕЕ 180 м<sup>2</sup></div>
            <?= Html::img($photoLink, ['alt' => $project->title, 'style' => 'width: 100%; height: auto;']) ?>

            <div class="_more-button">
                <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
            </div>
        </a>
    </div>
    <div class="_content">
            <?php
            $panel->effectiveAreaFrom = 180;
            $panel->effectiveAreaTo = null;
            $project = $projectSearch->searchOneRandomByFilter($panel);
            $photoLink = $project->getMainPhoto(492, 369);
            ?>
            <a href="<?= \yii\helpers\Url::toRoute(['catalog/search', $panel->formName() => $panel->getAttributes()]) ?>" class="picture-block">
                <div class="_title">БОЛЬШИЕ ДОМА БОЛЕЕ 180 м<sup>2</sup></div>
                <?= Html::img($photoLink, ['alt' => $project->title, 'style' => 'width: 100%; height: auto;']) ?>

                <div class="_more-button">
                    <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
                </div>
            </a>
        </div>
        <div class="_content">
                <?php
                $panel->effectiveAreaFrom = 180;
                $panel->effectiveAreaTo = null;
                $project = $projectSearch->searchOneRandomByFilter($panel);
                $photoLink = $project->getMainPhoto(492, 369);
                ?>
                <a href="<?= \yii\helpers\Url::toRoute(['catalog/search', $panel->formName() => $panel->getAttributes()]) ?>" class="picture-block">
                    <div class="_title">БОЛЬШИЕ ДОМА БОЛЕЕ 180 м<sup>2</sup></div>
                    <?= Html::img($photoLink, ['alt' => $project->title, 'style' => 'width: 100%; height: auto;']) ?>

                    <div class="_more-button">
                        <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
                    </div>
                </a>
            </div>
</div>