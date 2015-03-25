<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DesignPhoto */

$this->title = Yii::t('app', 'Create Design Photo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Design Photos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="design-photo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
