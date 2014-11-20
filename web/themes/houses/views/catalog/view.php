<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

/* @var $model \app\models\Project */
$this->title = Yii::t('house', 'Project "{projectName}"', ['projectName' => $model->title] );
$this->params['breadcrumbs'][] = ['label' => Yii::t('house', 'Catalog Projects'), 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->params['mainMenu']['items'][2]['active'] = true;
?>
<?= $this->render('../layouts/_filter-panel', ['other' => true]) ?>
<!--main part-->
<div class="centralize">
    <?= $this->render('../layouts/_breadcrumbs', []) ?>

    <div class="main-title project"><?= strtoupper($this->title) ?> | <b><?= $model->effectiveArea ?> м<sup>2</sup></b></div>

    <div class="main-block clearfix">
        <div class="right-block right">
            <div class="price-project">
                Цена проекта:
                <div class="_title">1100 y.e.</div>
            </div>
            <div class="order-phone">
                Заказать этот проект<br/>
                Вы можете по телефону:
                <div class="_title"><?= Yii::$app->params['contacts']['phone2'] ?></div>

            </div>
            <div class="right-menu">
                <a href="order-project.html">Как заказать проект?</a><a href="content-project.html">Состав проектов</a><a
                    href="individual-project.html">Индивидуальные проекты</a><a href="3D.html">3D прогулки</a>
            </div>


        </div>

        <div class="text-block-project ovhidden">
            <div class="project-nav">
                <a href="#">визуализации</a>|<a href="">планы</a>|<a href="/img/temp/image_project_slider-3.jpg" class="fancybox" rel="gallery2">фасады</a>|<a href="">расположение</a>|<a href="">3D прогулка</a>


            </div>

            <?php
            $photo = $model->getMainPhoto('/img/temp/image_project1.jpg');

            echo Html::a(
                Html::img($photo,
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
            $facadesPhotos = $model->getFacades()->all();
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

            <div class="plan-pictures">
                <?php
                $floorsPhotos = $model->getFloors()->all();
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
                    <li>
                        <span>Площадь:</span>
                        <span>119,89 м<sup>2</sup></span></li>
                    <li>
                        <span>Площадь гаража:</span>
                        <span>16,91 м<sup>2</sup></span></li>
                    <li>
                        <span>Площадь застройки:</span>
                        <span>116,98 м<sup>2</sup></span>
                    </li>
                    <li>
                        <span>Объем:</span>
                        <span>650,7 м<sup>2</sup></span></li>
                    <li>
                        <span>Высота:</span>
                        <span>8,88 м</span></li>
                    <li>
                        <span>Минимальная площадь участка:</span>
                        <span>24,55х17,88</span>
                    </li>
                </ul>
                <div class="_title">Технология</div>
                <ul class="_technology">
                    <li>
                        <span>Крыша:</span>
                        <span>керамическая плитка, угол наклона 45`</span></li>
                    <li>
                        <span>Полы:</span>
                        <span>бетон, литой</span></li>
                    <li>
                        <span>Стена:</span>
                        <span>2-слойные - газобетон SOLBET 24см + пенополистерол</span>
                    </li>

                </ul>
                <div class="_title">Отопление</div>
                <ul class="_parameters">
                    <li>
                        <span>Газ</span>
                    </li>
                    <li>
                        <span>Газ</span>
                    </li>

                </ul>
                <div class="_title">Описание</div>
                <ul class="_technology">
                    Тут идет краткое описание проекта или информация, которая заинтересует покупателя

                </ul>
            </div>



        </div>
    </div>

    <?= $this->render('../layouts/_parthners', []) ?>
</div>