<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Facade */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Facade',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Facades'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="facade-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
