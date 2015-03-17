<div class="right-menu">
    <?= \yii\helpers\Html::a('Как заказать проект?', ['catalog/pages/order-project']) ?>
    <?= \yii\helpers\Html::a('Состав проектов', ['catalog/pages/structure-projects']) ?>
    <?= \yii\helpers\Html::a('Индивидуальные проекты', ['catalog/pages/custom_projects']) ?>
    <?= \yii\helpers\Html::a('3D прогулки', ['catalog/pages/3d_progulka']) ?>
</div>
<?php $this->registerJsFile(Yii::$app->request->baseUrl.'/js/rightBlock.js',['depends' => [\yii\web\JqueryAsset::className()]]); ?>