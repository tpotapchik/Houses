<?php

use app\models\Roof;
use app\models\Type;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */
$roofs = Roof::find()->all();
$types = Type::find()->all();
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'numCat')->textInput(['maxlength' => 255])->hint('Используется для формирования ссылок') ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'technology')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ready')->checkbox() ?>

    <?= $form->field($model, 'new')->checkbox() ?>

    <?= $form->field($model, 'southEnter')->checkbox() ?>

    <?= $form->field($model, 'roof_id')->dropDownList(ArrayHelper::map($roofs, 'id', 'value'))->label('Крыша') ?>

    <?= $form->field($model, 'energySaving')->checkbox() ?>

    <?= $form->field($model, 'type_id')->dropDownList(ArrayHelper::map($types, 'id', 'value'))->label('Тип') ?>

    <?= $form->field($model, 'typeView_id')->dropDownList(ArrayHelper::map(\app\models\TypeView::find()->all(), 'id', 'value'))->label('Вид') ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'processedValue'))->label('Категория') ?>

    <?= $form->field($model, 'collection_id')->dropDownList(ArrayHelper::map(\app\models\Collection::find()->all(), 'id', 'value'))->label('Коллекция') ?>

    <?= $form->field($model, 'carPlaces')->textInput() ?>

    <?= $form->field($model, 'cubage')->textInput() ?>

    <?= $form->field($model, 'effectiveArea')->textInput() ?>

    <?= $form->field($model, 'priceUSD')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Create') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
