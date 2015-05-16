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
    $designs = Yii::$app->getDb()->cache(function (Connection $db) {
        return Design::find()->where('project_id IS NOT NULL')->orderBy(new Expression('RAND()'))->limit(6)->all();
    }, 60 * 5);
    foreach ($designs as $design) {
        /** @var Design $design */

        if ($design) {
            /** @var \app\models\DesignPhoto $photo */
            $photo = $design->getDesignPhotos()->one();
            ?>
            <?=
            $photo ?
                \yii\helpers\Html::a(
                    \yii\helpers\Html::img($photo->getFile(327, 206)),
                    $design->getLink(),
                    ['class' => 'interior-block left']
                ) : '';
            ?>
        <?php
        }
    }
?>
</div>