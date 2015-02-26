<?php
/* @var $this yii\web\View */
use app\library\NbrbClient;
use app\models\GeneralHelper;
use yii\helpers\Html;

/* @var $model \app\models\Project */
$this->title = Yii::t('house', 'Project "{projectName}"', ['projectName' => $model->title]);
/** @var \app\models\Category $category */
$category = $model->getCategory()->one();
$this->params['breadcrumbs'][] = ['label' => Yii::t('house', 'Catalog Projects'), 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = ['label' => GeneralHelper::mb_ucfirst($category->processedValue), 'url' => ['catalog/'.$category->url]];
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->params['mainMenu']['items'][2]['active'] = true;
?>
<?= $this->render('../layouts/_filter-panel', ['other' => true]) ?>
<!--main part-->
<div class="centralize" itemscope itemtype ="http://schema.org/ItemPage">
    <?= $this->render('../layouts/_breadcrumbs', []) ?>

    <div class="main-title project"><span itemprop="name"><?= strtoupper($this->title) ?></span> | <b><?= $model->effectiveArea ?> м<sup>2</sup></b></div>

    <div class="main-block clearfix">
        <div class="right-block right">
        <?php if ($model->priceUSD > 0):?>
            <?php
            $nbrb = new NbrbClient();
            $rate = $nbrb->getCurrencyOnDate(null, NbrbClient::CURRENCY_EUR);
            $rate = $rate + (2/100) * $rate; //increment rate to 2 percent
            $formatter = Yii::$app->getFormatter();
            $totalPrice = $rate * $model->priceUSD;
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
            $photo = $model->getMainPhoto();
            $facadesPhotos = $model->getFacades()->all();
            $facadeFirstLink = \yii\helpers\ArrayHelper::remove($facadesPhotos, 0);
            if ($facadeFirstLink !== null) {
                $facadeFirstLink = $facadeFirstLink->file;
            } else {
                $facadeFirstLink = '#';
            }

            ?>
            <div class="project-nav">
                <a href="#">визуализации</a>|<a href="">планы</a>|<a href="<?= $facadeFirstLink ?>" class="fancybox" rel="gallery2">фасады</a>|<a href="">расположение</a>|<a href="">3D прогулка</a>
            </div>

            <?php
            echo Html::a(
                Html::img(
                    $photo,
                    [
                        'alt' => $this->title,
                        'class' => 'main-pic'
                    ]
                ),
                $photo,
                [
                    'class' => 'fancybox',
                    'rel' => 'gallery2'
                ]
            );
            ?>
            <?php
            /** @var \app\models\Facade $facade */
            foreach ($facadesPhotos as $facade) {
                echo Html::a(
                    '',
                    $facade->file,
                    [
                        'class' => 'fancybox',
                        'rel' => 'gallery2'
                    ]
                );
            }

            $photos = $model->getOtherPhotos();
            /** @var \app\models\Photo $photo */
            foreach ($photos as $facade) {
                echo Html::a(
                    '',
                    $facade->file,
                    [
                        'class' => 'fancybox',
                        'rel' => 'gallery2'
                    ]
                );
            }

            ?>
        </div>
        <div class="text-block-project ovhidden">

            <div class="plan-pictures">
                <?php
                $floorsPhotos = $model->getFloors()->all();
                /** @var \app\models\Floor $floor */
                foreach ($floorsPhotos as $floor) {
                    echo Html::a(
                        Html::img($floor->file, ['alt' => $floor->title]),
                        $floor->file,
                        [
                            'class' => 'fancybox',
                            'rel' => 'gallery2'
                        ]
                    );
                }
                ?>
            </div>

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
<!--                <div class="_title">Технология</div>-->
<!--                <ul class="_technology">-->
<!--                    <li>-->
<!--                        <span>Крыша:</span>-->
<!--                        <span>керамическая плитка, угол наклона 45`</span></li>-->
<!--                    <li>-->
<!--                        <span>Полы:</span>-->
<!--                        <span>бетон, литой</span></li>-->
<!--                    <li>-->
<!--                        <span>Стена:</span>-->
<!--                        <span>2-слойные - газобетон SOLBET 24см + пенополистерол</span>-->
<!--                    </li>-->
<!---->
<!--                </ul>-->
<!--                <div class="_title">Отопление</div>-->
<!--                <ul class="_parameters">-->
<!--                    <li>-->
<!--                        <span>Газ</span>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <span>Газ</span>-->
<!--                    </li>-->
<!---->
<!--                </ul>-->
                <div class="_title">Описание</div>
                <ul class="_technology">
                    <?= $model->technology ?>
                </ul>
            </div>



        </div>
    </div>

    <?= $this->render('../layouts/_parthners', []) ?>
</div>