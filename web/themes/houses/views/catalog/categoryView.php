<?php
/**
 * Created by PhpStorm.
 * User: coxa
 * Date: 01.12.14
 * Time: 22:29
 */
use app\models\ProjectSearch;
use app\widgets\ProjectsGrid;

/* @var $this yii\web\View */
/* @var $category \app\models\Category */

$this->title = \app\models\GeneralHelper::mb_ucfirst($category->processedValue);
$this->params['breadcrumbs'][] = ['label' => Yii::t('house', 'Catalog Projects'), 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->params['mainMenu']['items'][2]['active'] = true;
?>

<?= $this->render('../layouts/_filter-panel', ['other' => true]) ?>

<!--main part-->
<div class="centralize">

    <?= $this->render('../layouts/_breadcrumbs', []) ?>

    <div class="main-title"><?= strtoupper($this->title)?></div>


    <?php
    $searchModel = new ProjectSearch();
    $dataProvider = $searchModel->search(['category_id' => $category->id]);
    ?>

    <?= ProjectsGrid::widget([
        'dataProvider' => $dataProvider,
    ]);
    ?>


    <?= $this->render('../layouts/_parthners', []) ?>
</div>