<?php

use dosamigos\ckeditor\CKEditor;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Design */
/* @var $modelPhoto app\models\DesignPhoto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="design-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'project_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\app\models\Project::find()->all(), 'id', 'title'),
        'options' => ['placeholder' => 'Выбери проект ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Проект');
    ?>

    <?= $form->field($modelPhoto, 'file[]')->widget(FileInput::classname(), [
        'options' => [
            'accept' => 'image/*',
            'multiple' => true,
            'overwriteInitial' => false,
            'pluginOptions' => [
                'initialPreviewShowDelete' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'meta_keywords')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'meta_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'text')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full',
        'clientOptions' => [
            'contentsCss' => '/css/advice.css'
        ]
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
