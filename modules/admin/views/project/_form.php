<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    <?//= $form->field($model, 'numCat')->textInput(['maxlength' => 255]) ?>-->

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'technology')->textarea(['rows' => 6]) ?>
<!--
    <?= $form->field($model, 'ready')->textInput() ?>

    <?= $form->field($model, 'new')->textInput() ?>

    <?= $form->field($model, 'southEnter')->textInput() ?>

    <?= $form->field($model, 'roof_id')->textInput() ?>

    <?= $form->field($model, 'energySaving')->textInput() ?>

    <?= $form->field($model, 'type_id')->textInput() ?>

    <?= $form->field($model, 'typeView_id')->textInput() ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'collection_id')->textInput() ?>
    -->
    <?= $form->field($model, 'carPlaces')->textInput() ?>

    <?= $form->field($model, 'cubage')->textInput() ?>

    <?= $form->field($model, 'effectiveArea')->textInput() ?>

    <?= $form->field($model, 'priceUSD')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Create') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
