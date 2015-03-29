<?php
/* @var $this yii\web\View */
use app\models\GeneralHelper;

/* @var $design \app\models\Design */
$userTitle = $this->title = $design->title;
$photos = $design->getDesignPhotos()->all();
Yii::$app->opengraph->title = $this->title;
Yii::$app->opengraph->image = \yii\helpers\Url::to([$photos[0]->file], true);

$this->params['breadcrumbs'][] = ['label' => 'Дизайн интерьеров', 'url' => ['design/index']];
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->params['mainMenu']['items'][3]['active'] = true;

$this->registerMetaTag(['name' => 'keywords', 'content' => $design->meta_keywords]);
$this->registerMetaTag(['name' => 'description', 'content' => $design->meta_description]);
?>
<?= $this->render('../layouts/_filter-panel', ['other' => true]) ?>
<div class="centralize">
    <?= $this->render('../layouts/_breadcrumbs', []) ?>

    <div class="main-title">
        <?= $userTitle ?>
    </div>

    <div class="main-block clearfix">

    </div>

    <?= $this->render('../layouts/_parthners', []) ?>
</div>
