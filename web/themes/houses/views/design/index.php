<?php
/* @var $this yii\web\View */
    $this->title = $article->title;
    $this->params['breadcrumbs'][] = $this->title;

    $this->registerMetaTag(['name' => 'keywords', 'content' => $article->meta_keywords]);
    $this->registerMetaTag(['name' => 'description', 'content' => $article->meta_description]);
?>

<?= $this->render('../layouts/_filter-panel', ['other' => true]) ?>
<!--main part-->
<div class="centralize">
    <?= $this->render('../layouts/_breadcrumbs', []) ?>

    <div class="main-title">ИНТЕРЬЕРЫ ПОПУЛЯРНЫХ ПРОЕКТОВ</div>
    <div class="main-block-interior clearfix">
        <a href="design-page.html" class="interior-block left"><div class="_title">Aga/Ага</div><img src="img/temp/interior1.jpg" alt="Интерьер"/></a>
        <a href="#" class="interior-block left"><div class="_title">Alabaster/Алабастер</div><img src="img/temp/interior2.jpg" alt="Интерьер"/></a>
        <a href="#" class="interior-block left"><div class="_title">Aga/Ага</div><img src="img/temp/interior3.jpg" alt="Интерьер"/></a>
        <a href="#" class="interior-block left"><div class="_title">Aga/Ага</div><img src="img/temp/interior4.jpg" alt="Интерьер"/></a>
        <a href="#" class="interior-block left"><div class="_title">Aga/Ага</div><img src="img/temp/interior5.jpg" alt="Интерьер"/></a>
        <a href="#" class="interior-block left"><div class="_title">Aga/Ага</div><img src="img/temp/interior6.jpg" alt="Интерьер"/></a>
        <a href="#" class="interior-block left"><div class="_title">Aga/Ага</div><img src="img/temp/interior1.jpg" alt="Интерьер"/></a>
        <a href="#" class="interior-block left"><div class="_title">Aga/Ага</div><img src="img/temp/interior2.jpg" alt="Интерьер"/></a>
        <a href="#" class="interior-block left"><div class="_title">Aga/Ага</div><img src="img/temp/interior3.jpg" alt="Интерьер"/></a>
    </div>
    <div class="pagination result clearfix">
        <a href="" class="before"></a><a href="#" class="active">1</a><a href="#">2</a><a href="#">3</a><a href="" class="after"></a>
    </div>


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
