<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Floor */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Floor',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Floors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="floor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
