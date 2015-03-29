<?php
    /* @var $this yii\web\View */
    use app\widgets\DesignGrid;

    $this->title = $article->title;
    $this->params['breadcrumbs'][] = $this->title;

    $this->registerMetaTag(['name' => 'keywords', 'content' => $article->meta_keywords]);
    $this->registerMetaTag(['name' => 'description', 'content' => $article->meta_description]);

    $dataProvider = new \app\models\DesignSearch();
    $dataProvider = $dataProvider->search([]);
?>

<?= $this->render('../layouts/_filter-panel', ['other' => true]) ?>
<!--main part-->
<div class="centralize">
    <?= $this->render('../layouts/_breadcrumbs', []) ?>

    <div class="main-title">ИНТЕРЬЕРЫ ПОПУЛЯРНЫХ ПРОЕКТОВ</div>

    <?= DesignGrid::widget([
        'dataProvider' => $dataProvider,
        'mainBlockClass' => 'main-block-interior clearfix'
    ]);
    ?>


    <div class="main-title"><?= $article->title ?></div>
    <div class="main-block clearfix">
        <div class="right-block right">
            <?= $this->render('../layouts/_right-menu', []) ?>
            <?= $this->render('../layouts/_newsAnounce', []) ?>
        </div>
        <div class="main-text-block ovhidden">
            <?= $article->full_text ?>
        </div>
    </div>

    <?= $this->render('../layouts/_our-projects', []) ?>
    <?= $this->render('../layouts/_parthners', []) ?>
</div>
