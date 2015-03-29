<?php
/**
 * Houses
 * User: coxa
 * Date: 13.11.14
 * Time: 0:59
 */
use app\models\Design;
use yii\db\Connection;
use yii\db\Expression;

?>
<div class="main-title">ИНТЕРЬЕРЫ ПОПУЛЯРНЫХ ПРОЕКТОВ</div>
<div class="main-block-interior clearfix">
<?php
    $photos = [];
    $limit = 7;
    for ($i = 1; $i < $limit; $i++) {
        /** @var Design $design */
        $design = Yii::$app->getDb()->cache(function (Connection $db) {
            return Design::find()->where('project_id IS NOT NULL')->orderBy(new Expression('RAND()'))->limit(1)->one();
        }, 60 * 5);

        /** @var \app\models\DesignPhoto $photo */
        $photo = $design->getDesignPhotos()->one();
?>
        <?=
        $photo ?
        \yii\helpers\Html::a(
            \yii\helpers\Html::img($photo->file),
            $design->getLink()
        , ['class' => 'interior-block left']) : '';
        ?>
    <?php

    }
?>
</div>