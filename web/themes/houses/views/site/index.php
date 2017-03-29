<?php
/* @var $this yii\web\View */
use app\models\Article;

/** @var app\models\Article $mainArticle */
$mainArticle = Article::getMain();

$this->registerMetaTag(['name' => 'keywords', 'content' => $mainArticle->meta_keywords]);
$this->registerMetaTag(['name' => 'description', 'content' => $mainArticle->meta_description]);
?>
<div class="centralize">
    <div class="slider-content">
        <?= $this->render('../layouts/_filter-panel', ['other' => false]) ?>
        <div class="slider">
            <div class="slider-item" style="background-image: url('/img/temp/slider.jpg')">
                <a href="/catalog/odnosemeynyy_odnoetajnyy/ariel" class="slider-link">
                    <div class="slider-text">
                        <div class="_title">ARIEL</div>
                        <div class="_content ovhidden">Просторный одноэтажный дом с гаражом для 2 автомобилей.<br> В составе помещений гостиная с выходом на террасу, кухня-столовая, 3 спальни, 2 ванные комнаты и гостевой санузел.
                        </div>
                    </div>
                </a>
            </div>

            <div class="slider-item" style="background-image: url('/img/temp/slider2.jpg')">
                <a href="/catalog/odnosemeynyy_odnoetajnyy/decyma" class="slider-link">
                    <div class="slider-text">
                        <div class="_title">DECYMA</div>
                        <div class="_content ovhidden">Симпатичный одноэтажный дом с гаражом для 2 автомобилей. Внутренняя планировка представляет собой эффективное взаимодействие дневной и ночных зон. Удобная кухня-столовая с кладовкой, а также уютная гостиная с выходом на террасу и камином - места ежедневного досуга жильцов и их гостей. Дом располагает 4 спальнями и 2 ванными комнатами.
                        </div>
                    </div>
                </a>
            </div>

            <div class="slider-item" style="background-image: url('/img/temp/slider3.jpg')">
                <a href="/catalog/odnosemeynyy_odnoetajnyy/ambrozja" class="slider-link">
                    <div class="slider-text">
                        <div class="_title">AMBROZJA</div>
                        <div class="_content ovhidden">Одноэтажный современный дом с гаражом на 2 автомобиля. <br> Дневная зона включает: столовую, совмещенную с просторной гостиной и кухню, ночная – 3 спальни и ванную.
                        </div>
                    </div>
                </a>
            </div>
            <div class="slider-item" style="background-image: url('/img/temp/slider4.jpg')">
                <a href="/catalog/odnosemeynyy_odnoetajnyy/ambrozja_3" class="slider-link">
                    <div class="slider-text">
                        <div class="_title">AMBROZJA 3</div>
                        <div class="_content ovhidden">Современный и просторный одноэтажный дом с гаражом для 2 автомобилей. <br>В составе помещений: холл, кухня-столовая, большая гостиная с камином и выходом на террасу, 4 спальни с гардеробными, 2 ванные комнаты, санузел и котельная.
                        </div>
                    </div>
                </a>
            </div>
            <div class="slider-item" style="background-image: url('/img/temp/slider5.jpg')">
                <a href="/catalog/odnosemeynyy_s_jiloy_mansardoy/jezyna" class="slider-link">
                    <div class="slider-text">
                        <div class="_title">JEŻYNA</div>
                        <div class="_content ovhidden">Опрятный односемейный дом с мансардой. <br> Первый этаж включает кухню-гостиную, гостевую спальню и санузел. <br> На мансарде расположились 4 спальни и ванная.
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div>

        <!--main part-->

        <div class="tabs-panel-content">
            <div class="tabs" id="tab-main">
                <a href="#" class="active tab-item">ТОП - 10 </a>
                <a href="#" class="tab-item">ТОП - 50</a>
                <a href="#" class="tab-item">Новые</a>
                <a href="#" class="tab-item">Одноэтажные</a>
                <a href="#" class="tab-item">С мансардой</a>
                <a href="#" class="tab-item">Классика</a>
                <a href="#" class="tab-item">Современные</a>
                <a href="#" class="tab-item">Небольшой</a>
                <a href="#" class="tab-item">Средний</a>
                <a href="#" class="tab-item">Большой</a>
                <a href="#"  class="tab-item">С гаражом</a>
            </div>
        </div>

        <div class="centralize clearfix">

            <div class="layout">
                <div class="left-block-content">

                    <!-- место для баннеров-->
                    <!--<div class="banners-content clearfix">-->
                    <!--<div>Место для баннера 1</div>-->
                    <!--<div>Место для баннера 2</div>-->
                    <!--</div>-->

                    <?= $this->render('../layouts/_our-projects', []) ?>

                    <?= $this->render('../layouts/_we-suggest', []) ?>

                    <?= $this->render('../layouts/_popular', []) ?>

                    <?= $this->render('../layouts/_favorite', []) ?>

                    <div class="main-block clearfix">
                        <div class="right-block right">
                            <?= $this->render('../layouts/_newsAnounce', []) ?>
                            <?= $this->render('../layouts/_right-menu', []) ?>


                        </div>
                        <div class="main-text-block ovhidden">
                            <?= $mainArticle->full_text ?>
                        </div>
                    </div>
                </div>


                <div>
                    <?= $this->render('../layouts/_parthners', []) ?>
                </div>
                <!--/main part-->
            </div>

                       <div class="sidebar">
                                <ul>
                                    <li><a href="#"><span>Проекты</span></a></li>
                                    <li><a href="#"><span>Как купить проект дома?</span></a></li>
                                    <li><a href="#"><span>Что включает проект?</span></a></li>
                                    <li><a href="#"><span>Ландшафтный дизайн</span></a></li>
                                </ul>
                            </div>
            </div>
</div>
    </div>