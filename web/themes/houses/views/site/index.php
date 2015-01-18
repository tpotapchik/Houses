<?php
/* @var $this yii\web\View */
/** @var app\models\Article $article */
$this->title = $article->title;

$this->registerMetaTag(['name' => 'keywords', 'content' => $article->meta_keywords]);
$this->registerMetaTag(['name' => 'description', 'content' => $article->meta_description]);
?>

<div class="slider-content">
    <?= $this->render('../layouts/_filter-panel', ['other' => false]) ?>
    <div class="slider">
        <div class="slider-item" style="background-image: url('/img/temp/slider.jpg')">
            <a href="/catalog/odnosemeynyy_odnoetajnyy/ariel_KO" class="slider-link">
                <div class="slider-text">
                    <div class="centralize">
                        <div class="_title">ARIEL</div>
                        <div class="_content ovhidden">Просторный одноэтажный дом с гаражом для 2 автомобилей.<br> В составе помещений гостиная с выходом на террасу, кухня-столовая, 3 спальни, 2 ванные комнаты и гостевой санузел.
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="slider-item" style="background-image: url('/img/temp/slider2.jpg')">
            <a href="/catalog/odnosemeynyy_odnoetajnyy/decyma_CE" class="slider-link">
                <div class="slider-text">
                    <div class="centralize">
                        <div class="_title">DECYMA</div>
                        <div class="_content ovhidden">Симпатичный одноэтажный дом с гаражом для 2 автомобилей. Внутренняя планировка представляет собой эффективное взаимодействие дневной и ночных зон. Удобная кухня-столовая с кладовкой, а также уютная гостиная с выходом на террасу и камином - места ежедневного досуга жильцов и их гостей. Дом располагает 4 спальнями и 2 ванными комнатами.
                        </div>
                    </div>

                </div>
            </a>
        </div>

        <div class="slider-item" style="background-image: url('/img/temp/slider3.jpg')">
            <a href="/catalog/odnosemeynyy_odnoetajnyy/ambrozja_CE" class="slider-link">
                <div class="slider-text">
                    <div class="centralize">
                        <div class="_title">AMBROZJA</div>
                        <div class="_content ovhidden">Одноэтажный современный дом с гаражом на 2 автомобиля. <br> Дневная зона включает: столовую, совмещенную с просторной гостиной и кухню, ночная – 3 спальни и ванную.
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="slider-item" style="background-image: url('/img/temp/slider4.jpg')">
                    <a href="/catalog/odnosemeynyy_odnoetajnyy/ambrozja_3_CE" class="slider-link">
                        <div class="slider-text">
                            <div class="centralize">
                                <div class="_title">AMBROZJA 3</div>
                                <div class="_content ovhidden">Современный и просторный одноэтажный дом с гаражом для 2 автомобилей. <br>В составе помещений: холл, кухня-столовая, большая гостиная с камином и выходом на террасу, 4 спальни с гардеробными, 2 ванные комнаты, санузел и котельная.
                                </div>
                            </div>
                        </div>
                    </a>
        </div>
        <div class="slider-item" style="background-image: url('/img/temp/slider5.jpg')">
                    <a href="/catalog/odnosemeynyy_s_jiloy_mansardoy/jezyna_CE" class="slider-link">
                        <div class="slider-text">
                            <div class="centralize">
                                <div class="_title">JEŻYNA</div>
                                <div class="_content ovhidden">Опрятный односемейный дом с мансардой. <br> Первый этаж включает кухню-гостиную, гостевую спальню и санузел. <br> На мансарде расположились 4 спальни и ванная.
                                </div>
                            </div>
                        </div>
                    </a>
        </div>
    </div>
</div>

<!--main part-->
<div class="centralize">

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
            <?= $article->full_text ?>
        </div>
    </div>

    <?= $this->render('../layouts/_parthners', []) ?>
</div>
<!--/main part-->