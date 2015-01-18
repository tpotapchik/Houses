<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('yii', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('yii', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'numCat',
            'title',
            'technology:ntext',
            'ready:boolean',
            'new:boolean',
            'southEnter:boolean',
            'roof.value:text:Крыша',
            'energySaving:boolean',
            'type.value:text:Тип',
            'typeView.value:text:Вид',
            'category.processedValue:text:Категория',
            'collection.value:text:Коллекция',
            'carPlaces',
            'cubage',
            'effectiveArea',
            [
                'attribute' => 'priceUSD',
                'format' => [
                    'currency',
                    'USD'
                ]
            ]
        ],
    ]) ?>

</div>
