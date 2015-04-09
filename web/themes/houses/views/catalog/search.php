<?php
/* @var $this yii\web\View */
/** @var \yii\data\BaseDataProvider $dataProvider */

use app\widgets\ProjectsGrid;

$this->title = 'Результаты поиска';
$this->params['breadcrumbs'][] = ['label' => Yii::t('house', 'Catalog Projects'), 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->params['mainMenu']['items'][2]['active'] = true;
?>

<?= $this->render('../layouts/_filter-panel', ['other' => true, 'model' => $model]) ?>
<!--main part-->
<div class="centralize">

    <?= $this->render('../layouts/_breadcrumbs', []) ?>

    <div class="main-title"><?= strtoupper($this->title)?></div>


    <?= ProjectsGrid::widget([
        'dataProvider' => $dataProvider,
    ]);
    ?>

    <?= $this->render('../layouts/_parthners', []) ?>
</div>