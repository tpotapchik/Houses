<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Design */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Design',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Designs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="design-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(Yii::t('app', 'Photos'), ['design-photo/view', 'design_id' => $model->id]) ?>
    </p>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
