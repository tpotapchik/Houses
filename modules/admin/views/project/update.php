<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = Yii::t('yii', 'Update {modelClass}: ', [
    'modelClass' => 'Project',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('yii', 'Update');
?>
<div class="project-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <em>Смотреть на сайте: <?= Html::a($model->title, ['/catalog/'.$model->getCategory()->one()->url.'/'.$model->numCat], ['target' => '_blank']) ?></em>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
