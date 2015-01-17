<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'url_key')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'author_id')->dropDownList(ArrayHelper::map(\app\models\User::find()->all(), 'id', 'username')) ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(\app\models\ArticleCategory::find()->all(), 'id', 'title')) ?>

    <?= $form->field($model, 'created_at')->widget(DatePicker::className()) ?>

    <?= $form->field($model, 'is_published')->checkbox() ?>

    <?= $form->field($model, 'intro_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'full_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'meta_keywords')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'meta_description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Create') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
