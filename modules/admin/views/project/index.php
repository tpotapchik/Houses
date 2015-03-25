<?php

use app\models\Category;
use app\models\Project;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Projects');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>

<?php if (Yii::$app->getSession()->hasFlash('success')) : ?>
    <div class="alert alert-success">
        <?= Yii::$app->getSession()->getFlash('success') ?>
    </div>
<?php endif; ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Project',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'numCat',
            'title',
            'technology:ntext',
//            'ready',
            // 'new',
            // 'southEnter',
            // 'roof_id',
            // 'energySaving',
            // 'type_id',
            [
                'attribute' => 'type_id',
                'value' => 'type.value',
                'filter' => ArrayHelper::map(\app\models\Type::find()->all(), 'id', 'value')
            ],
            // 'typeView_id',
            [
                'attribute' => 'typeView',
                'value' => 'typeView.value'
            ],
            // 'category_id',
            [
                'attribute' => 'category_id',
                'value' => 'category.processedValue',
                'label' => Yii::t('app', 'Category'),
                'filter' => ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'processedValue')
            ],
            // 'collection_id',
            // 'carPlaces',
            // 'cubage',
            // 'effectiveArea',
            [
                'attribute' => 'priceUSD',
                'label' => 'Цена в EUR',
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => ['design' =>
                function($url, $model, $key) {
                    /** @var Project $model */
                    if ($model->hasDesigns()) {
                        $class = 'text-success';
                        $url = ['design/update', 'id' => $model->getDesign()->one()->id ];
                    } else {
                        $class = 'text-danger';
                        $url = ['design/create', 'project_id' => $model->id ];
                    }
                    return Html::a('<span class="glyphicon glyphicon-lamp"></span>', $url, [
                        'title' => Yii::t('app', 'Design'),
                        'data-pjax' => '0',
                        'class' => $class
                    ]);
                }],
                'template' => '{view} {update} {delete} {design}'
            ],
        ],
    ]); ?>

</div>
