<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii', 'Projects');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('yii', 'Create {modelClass}', [
    'modelClass' => 'Project',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'numCat',
            'title',
            'technology:ntext',
            'ready',
            // 'new',
            // 'southEnter',
            // 'roof_id',
            // 'energySaving',
            // 'type_id',
            // 'typeView_id',
            // 'category_id',
            // 'collection_id',
            // 'carPlaces',
            // 'cubage',
            // 'effectiveArea',
            // 'priceUSD',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
