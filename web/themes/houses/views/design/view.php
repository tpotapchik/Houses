<?php
/* @var $this yii\web\View */
use app\models\Design;
use app\models\GeneralHelper;
use app\models\Photo;
use yii\helpers\Html;

/* @var $design Design */
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

    <div class="main-block-interior clearfix">
        <?php
            $photos = [];
        /** @var \app\models\Project $project */
        $project = $design->getProject()->one();
        $photos [] = $project->getMainPhoto();
        $otherPhotos = $project->getOtherPhotos();
        /** @var Photo $pho */
        foreach($otherPhotos as $pho) {
            if ($pho->title !== 'участок') {
                $photos[] = $pho->file;
            }
        }

        $otherPhotos = $design->getDesignPhotos()->all();
        foreach($otherPhotos as $pho) {
            $photos[] = $pho->file;
        }

        foreach($photos as $photo) {
            echo Html::a(Html::img($photo), $photo, ['class' => 'interior-block left fancybox']);
        }
        ?>
    </div>

    <p>
        <?= Html::a('Перейти к проекту', $design->getProject()->one()->getLink(), [
            'class' => '',
            'rel' => 'gallery2'
        ]) ?>
    </p>

    <div class="main-title">ДИЗАЙН ИНТЕРЬЕРОВ</div>

    <div class="main-block clearfix">
        <div class="right-block right" style="position: static; margin-left: 0px;">
            <?= $this->render('../layouts/_right-menu', []) ?>
            <?= $this->render('../layouts/_newsAnounce', []) ?>
        </div>
        <div class="main-text-block ovhidden">
            <?= $design->text ?>
        </div>
    </div>

    <?= $this->render('../layouts/_parthners', []) ?>
</div>
