<?php

use karpoff\icrop\CropImageUpload;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Photo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="photo-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->dropDownList([
        'фото' => 'фото',
        'тыльный-фото' => 'тыльный-фото',
        'участок' => 'участок',
    ]) ?>

    <?= $form->field($model, 'file')->widget(CropImageUpload::className(), [
        'ratio' => 1.97,
        'url' => '',
        'crop_value' => '0-0-100-100'
    ]) ?>

    <?= $form->field($model, 'project_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
