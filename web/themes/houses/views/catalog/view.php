<?php
/* @var $this yii\web\View */
use app\library\NbrbClient;
use app\models\GeneralHelper;
use yii\helpers\Html;

/* @var $model \app\models\Project */
$this->title = Yii::t('house', 'Project house "{projectName}"', ['projectName' => $model->title]);
/** @var \app\models\Category $category */
$category = $model->getCategory()->one();
$this->params['breadcrumbs'][] = ['label' => Yii::t('house', 'Catalog Projects'), 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = ['label' => GeneralHelper::mb_ucfirst($category->processedValue), 'url' => ['catalog/'.$category->url]];
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->params['mainMenu']['items'][2]['active'] = true;

$firstAdviceSentence = $model->getAdviceSentence();
$oldTitle = $this->title;
if (strlen($firstAdviceSentence) > 0) {
    $this->title .= ' - ' . $firstAdviceSentence;
}

$this->registerMetaTag(['name' => 'keywords', 'content' => $model->meta_keywords]);
$this->registerMetaTag(['name' => 'description', 'content' => $model->meta_description]);
?>
<?= $this->render('../layouts/_filter-panel', ['other' => true]) ?>
<!--main part-->
<div class="centralize" itemscope itemtype ="http://schema.org/ItemPage">
    <?= $this->render('../layouts/_breadcrumbs', []) ?>

    <div class="main-title project">
        Проект "<span itemprop="name" style="text-transform: uppercase;"><?= $model->title ?></span>" | <b><?= $model->effectiveArea ?> м<sup>2</sup></b>
    </div>

    <div class="main-block clearfix">

        <div class="right-block right">
        <?php if ($model->priceUSD > 0):?>
            <?php
            $nbrb = new NbrbClient();
            $rate = $nbrb->getCurrencyOnDate(null, NbrbClient::CURRENCY_EUR);
            $rate = $rate + (2/100) * $rate; //increment rate to 2 percent
            $formatter = Yii::$app->getFormatter();
            $totalPrice = $rate * $model->priceUSD;
            $totalPrice = round($totalPrice, -4, PHP_ROUND_HALF_UP);
            $price = NbrbClient::formatter($totalPrice, 'BYR');
            ?>
            <div class="price-project">
                Цена полного проекта,<br/>
                включая инженерный раздел:
                <div class="_title"><?= $price ?></div>
            </div>
        <?php endif; ?>
            <div class="order-phone">
                Заказать этот проект<br/>
                Вы можете по телефону:
                <div class="_title"><?= Yii::$app->params['contacts']['phone2'] ?></div>
            </div>
            <?= $this->render('../layouts/_right-menu', []) ?>
        </div>


        <div class="text-block-project ovhidden">
            <?php
            $mainPhoto = $model->getMainPhoto();
            $facadesPhotos = $model->getFacades()->all();
            $floorsPhotos = $model->getFloors()->all();
            $visualisations = $model->getOtherPhotos();

            usort($visualisations, function($a, $b) {
                if ($b->title === 'участок') {
                    return -1;
                } elseif ($a->title === 'участок') {
                    return 1;
                }
                return 0;
            });

            /** @var \app\models\Photo $photo */
            foreach ($visualisations as $key => $photo) {
                if ($photo->title === 'участок') {
                    $indexes['position'] = $key+1;
                    break;
                }
            }

            ?>
            <div class="project-nav">
                <a href="javascript: void(0);" onclick="openGallery()" data-imgIndex="0">визуализации</a>|
                <a class="openGallery" data-index="plans" href="javascript: void(0);">планы</a>|
                <a class="openGallery" data-index="facades" href="javascript: void(0);">фасады</a>|
                <a class="openGallery" data-index="position" href="javascript: void(0);">расположение</a>|
                <a href="">3D прогулка</a>
            </div>


            <?php
            echo Html::a(
                Html::img(
                    $mainPhoto,
                    [
                        'alt' => $this->title,
                        'class' => 'main-pic'
                    ]
                ),
                $mainPhoto,
                [
                    'class' => 'fancybox',
                    'rel' => 'gallery2'
                ]
            );
            //visualisations
            $positionsPhotos = [];
            /** @var \app\models\Photo $photo */
            foreach ($visualisations as $photo) {
                $options = [
                    'class' => 'fancybox visualisation',
                    'rel' => 'gallery2'
                ];
                if ($photo->title === 'участок') {
                    $options['class'] = $options['class'] . ' position';
                    $positionsPhotos[] = Html::a(
                        '',
                        $photo->file,
                        $options
                    );
                } else {
                    echo Html::a(
                        '',
                        $photo->file,
                        $options
                    );
                }
            }
            ?>

        </div>
        <div class="text-block-project ovhidden">

            <div class="characteristics ovhidden">
                <div class="_title">Технические характеристики</div>
                <ul class="_parameters">
                    <?php
                    $areas = \yii\helpers\ArrayHelper::map($model->getAreas()->all(), 'type', 'value');
                    $sizes = \yii\helpers\ArrayHelper::map($model->getSizes()->all(), 'type', 'value');
                    ?>
                    <li>
                        <span>Общая площадь:</span>
                        <span><?= $model->effectiveArea ?> м<sup>2</sup></span></li>
                    <li>
                        <span>Площадь кровли:</span>
                        <span><?= $areas['кровли'] ?> м<sup>2</sup></span></li>
                    <li>
                        <span>Площадь застройки:</span>
                        <span><?= $areas['застройки'] ?> м<sup>2</sup></span>
                    </li>
                    <li>
                        <span>Объем:</span>
                        <span><?= $model->cubage ?> м<sup>3</sup></span></li>
                    <li>
                        <span>Высота:</span>
                        <span><?= $sizes['высота'] ?> м</span></li>
                    <li>
                        <span>Минимальная площадь участка:</span>
                        <span><?= sprintf('%Gx%G', $sizes['ширина'], $sizes['длина']) ?></span>
                    </li>
                </ul>
                <div class="_title">Описание</div>
                <ul class="_technology">
                    <?= $model->technology ?>
                </ul>
            </div>
            <div class="plan-pictures">
                <?php
                //plans
                /** @var \app\models\Floor $floor */
                foreach ($floorsPhotos as $floor) {
                    echo Html::a(
                        Html::img($floor->file, ['alt' => $floor->title]),
                        $floor->file,
                        [
                            'class' => 'fancybox plans',
                            'rel' => 'gallery2'
                        ]
                    );
                }
                ?>
            </div>
            <?php
            /** @var \app\models\Facade $facade */
            foreach ($facadesPhotos as $facade) {
                echo Html::a(
                    '',
                    $facade->file,
                    [
                        'class' => 'fancybox facades',
                        'rel' => 'gallery2'
                    ]
                );
            }

            foreach ($positionsPhotos as $a) {
                echo $a;
            }
            ?>


        </div>
        <?php if (strlen($model->advice) > 0) : ?>
        <div class="text-block-project ovhidden">
            <h3 class="advice-title">Полезная информация</h3>
            <div class="advice"><?= $model->advice ?></div>
        </div>
        <?php endif; ?>
    </div>

    <?= $this->render('../layouts/_parthners', []) ?>
</div>

<?php $this->registerJsFile(Yii::$app->request->baseUrl.'/js/projectView.js',['depends' => [\yii\web\JqueryAsset::className()]]); ?>
