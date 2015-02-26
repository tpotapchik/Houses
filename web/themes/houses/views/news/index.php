<?php
/* @var $this yii\web\View */
use app\models\ArticleSearch;
use app\widgets\News;

$this->title = Yii::t('app', 'News');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('house', 'Catalog Projects'), 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = $this->title;

//Yii::$app->params['mainMenu']['items'][2]['active'] = true;
?>

<?= $this->render('../layouts/_filter-panel', ['other' => true]) ?>

<!--main part-->
<div class="centralize">

    <?= $this->render('../layouts/_breadcrumbs', []) ?>

    <div class="main-title">НОВОСТИ</div>

    <div class="main-block clearfix">
        <div class="right-block right">
            <?= $this->render('../layouts/_right-menu', []) ?>
        </div>

        <?php
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(['ArticleSearch' => [
            'category_id' => 2,
            'is_published' => true
        ]]);
        ?>

        <?= News::widget([
            'dataProvider' => $dataProvider,
        ]);
        ?>
    </div>



    <?= $this->render('../layouts/_our-projects', []) ?>

    <?= $this->render('../layouts/_parthners', []) ?>
</div>