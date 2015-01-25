<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Facade */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Facade',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Facades'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facade-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
