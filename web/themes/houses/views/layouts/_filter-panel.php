<?php
/**
 * Houses
 * User: coxa
 * Date: 13.11.14
 * Time: 0:31
 */
use app\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

if (!isset($model)) {
    $model = new \app\models\FilterPanel();
}

$categoryDropDown = ArrayHelper::map(Category::find()->all(), 'id', 'processedValue');
?>
<div class="filter-panel <?= $other?'other-page':'' ?>">
    <div class="_title">НАЙТИ ПРОЕКТ МЕЧТЫ</div>

    <?php $form = ActiveForm::begin(['id' => 'contact-form', 'action' => ['catalog/search'], 'method' => 'get']); ?>
    <div class="centralize clearfix">
        <div class="filter-column">
            <div class="filter-row clearfix">
                <label>Полезная площадь</label>

                <div class="small-input margin-r">от<?= Html::activeTextInput($model, 'effectiveAreaFrom') ?>м<sup>2</sup></div>
                <div class="small-input">до<?= Html::activeTextInput($model, 'effectiveAreaTo') ?>м<sup>2</sup></div>
            </div>

                <?= $form->field($model, 'categoryId', [
                    'labelOptions' => ['class' => ''],
                    'options' => ['class' => 'filter-row clearfix'],
                    'inputOptions' => [
                        'prompt'=>Yii::t('house', 'All'),
                        'class' => 'component-select medium-select'
                    ]
                ])->dropDownList($categoryDropDown) ?>
        </div>
        <div class="filter-column">
            <div class="filter-row clearfix">

                <?= $form->field($model, 'isGarage', [
                    'template' => "{input}\n{label}",
                    'labelOptions' => ['class' => ''],
                    'options' => ['class' => 'component-checkbox _label1'],
                    'inputOptions' => [
                        'class' => ''
                    ]
                ])->checkbox([], false) ?>

                <?= $form->field($model, 'hasGroundFloor', [
                    'template' => "{input}\n{label}",
                    'labelOptions' => ['class' => ''],
                    'options' => ['class' => 'component-checkbox _label2', 'style' => 'display: none;'],
                    'inputOptions' => [
                        'class' => '',
                    ]
                ])->checkbox([], false) ?>
            </div>

            <?= $form->field($model, 'projectTitle', [
                'labelOptions' => ['class' => ''],
                'options' => ['class' => 'filter-row without-m clearfix'],
                'inputOptions' => [
                    'class' => 'filter-input'
                ]
            ])?>

        </div>
        <div class="filter-submit js-submit-form">
            <button type="submit"><span>Найти!</span></button>
        </div>


    </div>
    <?php ActiveForm::end(); ?>

</div>