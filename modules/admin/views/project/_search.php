<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'numCat') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'technology') ?>

    <?= $form->field($model, 'ready') ?>

    <?php // echo $form->field($model, 'new') ?>

    <?php // echo $form->field($model, 'southEnter') ?>

    <?php // echo $form->field($model, 'roof_id') ?>

    <?php // echo $form->field($model, 'energySaving') ?>

    <?php // echo $form->field($model, 'type_id') ?>

    <?php // echo $form->field($model, 'typeView_id') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'collection_id') ?>

    <?php // echo $form->field($model, 'carPlaces') ?>

    <?php // echo $form->field($model, 'cubage') ?>

    <?php // echo $form->field($model, 'effectiveArea') ?>

    <?php // echo $form->field($model, 'priceUSD') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('yii', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('yii', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
