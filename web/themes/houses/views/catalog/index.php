<?php
/* @var $this yii\web\View */

use app\widgets\CategoryGrid;

$this->title = Yii::t('house', 'Catalog Projects');

$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('../layouts/_filter-panel', ['other' => true]) ?>

<!--main part-->
<div class="centralize">
    <?= $this->render('../layouts/_breadcrumbs', []) ?>
    <div class="main-title"><?= strtoupper($this->title)?></div>

    <?= CategoryGrid::widget([]);
    ?>

    <?php //todo insert here text about catalog ?>
    <?= $this->render('../layouts/_parthners', []) ?>
</div>
