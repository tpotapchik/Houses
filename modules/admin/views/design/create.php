<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Design */

$this->title = Yii::t('app', 'Create Design');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Designs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="design-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    /** @var int $project_id */
    if ($project_id) {
        $model->project_id = $project_id;
    }
    ?>
    <?= $this->render('_create_form', [
        'model' => $model,
        'modelPhoto' => $modelPhoto
    ]) ?>

</div>
