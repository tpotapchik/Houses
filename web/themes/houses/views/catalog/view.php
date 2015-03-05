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
    <div id="fixed-widget">
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
        </div>

        <div class="text-block-project ovhidden">
            <?php
            $mainPhoto = $model->getMainPhoto();
            $facadesPhotos = $model->getFacades()->all();
            $floorsPhotos = $model->getFloors()->all();
            $visualisations = $model->getOtherPhotos();

            $indexes = [
                'visualisation' => 0,
                'plans' => count($visualisations)+count($floorsPhotos)+count($visualisations)+1,
                'facades' => count($floorsPhotos)+count($visualisations)-1,
                'position' => 0
            ];

            /** @var \app\models\Photo $photo */
            foreach ($visualisations as $key => $photo) {
                if ($photo->title === 'участок') {
                    $indexes['position'] = $key+1;
                    break;
                }
            }



            ?>
            <div class="project-nav">
                <a href="javascript: openGallery(<?=$indexes['visualisation']?>);">визуализации</a>|
                <a href="javascript: openGallery(<?=$indexes['plans']?>);">планы</a>|
                <a href="javascript: openGallery(<?=$indexes['facades']?>);">фасады</a>|
                <a href="javascript: openGallery(<?=$indexes['position']?>);">расположение</a>|
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
            /** @var \app\models\Photo $photo */
            foreach ($visualisations as $photo) {
                echo Html::a(
                    '',
                    $photo->file,
                    [
                        'class' => 'fancybox',
                        'rel' => 'gallery2'
                    ]
                );
            }
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
            <div class="plan-pictures">
                <?php
                //plans
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



        </div>
        <?php if (strlen($model->advice) > 0) : ?>
        <div class="text-block-project ovhidden">
            <h3 class="advice-title">Полезный совет</h3>
            <div class="advice"><?= $model->advice ?></div>
        </div>
        <?php endif; ?>
    </div>
    <script>
        var FancyOptions = {
            nextEffect:'fade',
            prevEffect:'fade',
            scrollOutside: false,
            helpers	: {
                thumbs	: {
                    width	: 150,
                    height	: 150
                },
                overlay: {
                    locked: false
                }
            },
            beforeShow : function() {
                var alt = this.element.find('img').attr('alt');

                this.inner.find('img').attr('alt', alt);

                this.title = alt;
            }
        };
        var openGallery = function(index){
            FancyOptions.index = index;
            $.fancybox($('a[rel=gallery2]'), FancyOptions);
        };
    </script>

    <?= $this->render('../layouts/_parthners', []) ?>
</div>