<?php

/* @var $this yii\web\View */
/** @var app\models\Article $article */
$this->title = $article->title;
$this->params['breadcrumbs'][] = $this->title;

$this->registerMetaTag(['name' => 'keywords', 'content' => $article->meta_keywords]);
$this->registerMetaTag(['name' => 'description', 'content' => $article->meta_description]);
?>

<?= $this->render('../layouts/_filter-panel', ['other' => true]) ?>

<!--main part-->
<div class="centralize">

    <?= $this->render('../layouts/_breadcrumbs', []) ?>

    <div class="main-title"><?= $this->title ?></div>
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

    <?= $this->render('../layouts/_we-suggest', []) ?>

    <?= $this->render('../layouts/_parthners', []) ?>
</div>
