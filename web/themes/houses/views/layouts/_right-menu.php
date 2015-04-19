<div class="order-phone">
Вы можете связаться с нами<br/>
по телефонам:
<div class="_title"><a style="color:#fff; text-decoration: none;" href="tel:<?= Yii::$app->params['contacts']['phone1'] ?>"><?= Yii::$app->params['contacts']['phone1'] ?></a></div>
<div class="_title"><a style="color:#fff; text-decoration: none;" href="tel:<?= Yii::$app->params['contacts']['phone2'] ?>"><?= Yii::$app->params['contacts']['phone2'] ?></a></div>
или
<br/>
<div class="header_menu">
<div class="call_me"><a href="#popup" class="popup">Заказать звонок</a></div>
</div>
</div>

<div class="right-menu">
    <?= \yii\helpers\Html::a('Как заказать проект?', ['catalog/pages/order-project']) ?>
    <?= \yii\helpers\Html::a('Состав проектов', ['catalog/pages/structure-projects']) ?>
    <?= \yii\helpers\Html::a('Индивидуальные проекты', ['catalog/pages/custom_projects']) ?>
    <?= \yii\helpers\Html::a('3D прогулки', ['catalog/pages/3d_progulka']) ?>
</div>
<?php $this->registerJsFile(Yii::$app->request->baseUrl.'/js/rightBlock.js',['depends' => [\yii\web\JqueryAsset::className()]]); ?>