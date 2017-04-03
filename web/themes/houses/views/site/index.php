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
            <div class="slider-item" style="background-image: url('http://1house.by/wp-content/uploads/2017/01/Perspektiva-12.jpg")">
                <a href="/catalog/odnosemeynyy_odnoetajnyy/ariel" class="slider-link">
                    <div class="slider-text">
                        <div class="_title">ARIEL</div>
                        <div class="_content ovhidden">Просторный одноэтажный дом с гаражом для 2 автомобилей.<br> В
                            составе помещений гостиная с выходом на террасу, кухня-столовая, 3 спальни, 2 ванные комнаты
                            и гостевой санузел.
                        </div>
                    </div>
                </a>
            </div>

            <div class="slider-item" style="background-image: url('http://1house.by/wp-content/uploads/2017/01/Perspektiva-12.jpg')">
                <a href="/catalog/odnosemeynyy_odnoetajnyy/decyma" class="slider-link">
                    <div class="slider-text">
                        <div class="_title">DECYMA</div>
                        <div class="_content ovhidden">Симпатичный одноэтажный дом с гаражом для 2 автомобилей.
                            Внутренняя планировка представляет собой эффективное взаимодействие дневной и ночных зон.
                            Удобная кухня-столовая с кладовкой, а также уютная гостиная с выходом на террасу и камином -
                            места ежедневного досуга жильцов и их гостей. Дом располагает 4 спальнями и 2 ванными
                            комнатами.
                        </div>
                    </div>
                </a>
            </div>

            <div class="slider-item" style="background-image: url('/img/temp/slider3.jpg')">
                <a href="/catalog/odnosemeynyy_odnoetajnyy/ambrozja" class="slider-link">
                    <div class="slider-text">
                        <div class="_title">AMBROZJA</div>
                        <div class="_content ovhidden">Одноэтажный современный дом с гаражом на 2 автомобиля. <br>
                            Дневная зона включает: столовую, совмещенную с просторной гостиной и кухню, ночная – 3
                            спальни и ванную.
                        </div>
                    </div>
                </a>
            </div>
            <div class="slider-item" style="background-image: url('/img/temp/slider4.jpg')">
                <a href="/catalog/odnosemeynyy_odnoetajnyy/ambrozja_3" class="slider-link">
                    <div class="slider-text">
                        <div class="_title">AMBROZJA 3</div>
                        <div class="_content ovhidden">Современный и просторный одноэтажный дом с гаражом для 2
                            автомобилей. <br>В составе помещений: холл, кухня-столовая, большая гостиная с камином и
                            выходом на террасу, 4 спальни с гардеробными, 2 ванные комнаты, санузел и котельная.
                        </div>
                    </div>
                </a>
            </div>
            <div class="slider-item" style="background-image: url('/img/temp/slider5.jpg')">
                <a href="/catalog/odnosemeynyy_s_jiloy_mansardoy/jezyna" class="slider-link">
                    <div class="slider-text">
                        <div class="_title">JEŻYNA</div>
                        <div class="_content ovhidden">Опрятный односемейный дом с мансардой. <br> Первый этаж включает
                            кухню-гостиную, гостевую спальню и санузел. <br> На мансарде расположились 4 спальни и
                            ванная.
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!--main part-->
    <div>
        <!--tabs-->
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
                <a href="#" class="tab-item">С гаражом</a>
            </div>
        </div>

        <!--part with sidebar-->
        <div class="layout-sidebar">
            <div class="sidebar">
                <ul>
                    <li class="sidebar-item"><a href="#"><span>Проекты</span></a></li>
                    <li class="sidebar-item"><a href="#"><span>Как купить проект дома?</span></a></li>
                    <li class="sidebar-item"><a href="#"><span>Что включает проект?</span></a></li>
                    <li class="sidebar-item"><a href="#"><span>Ландшафтный дизайн</span></a></li>
                </ul>
                <div class="feedback">
                    <a href="#popup" class="popup">Заказать звонок</a>
                </div>
            </div>
            <div class="left-block-content">

                <!-- место для баннеров-->
                <!--<div class="banners-content clearfix">-->
                <!--<div>Место для баннера 1</div>-->
                <!--<div>Место для баннера 2</div>-->
                <!--</div>-->

                <div class="main-block clearfix">
                    <div class="_content">
                        <a href="project-house.html" class="picture-block">
                            <div class="_title-project">Aplauz 2 / Аплауш 2</div>
                            <img src="img/temp/house1.jpg" alt="Картинка дома"/>

                            <div class="_more-button">
                                <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
                            </div>
                        </a>
                    </div>
                    <div class="_content">
                        <a href="#" class="picture-block">
                            <div class="_title-project">Aplauz 2 / Аплауш 2</div>
                            <img src="img/temp/house1.jpg" alt="Картинка дома"/>

                            <div class="_more-button">
                                <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
                            </div>
                        </a>
                    </div>
                    <div class="_content">
                        <a href="#" class="picture-block">
                            <div class="_title-project">Aplauz 2 / Аплауш 2</div>
                            <img src="img/temp/house1.jpg" alt="Картинка дома"/>

                            <div class="_more-button">
                                <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
                            </div>
                        </a>
                    </div>
                    <div class="_content">
                        <a href="#" class="picture-block">
                            <div class="_title-project">Aplauz 2 / Аплауш 2</div>
                            <img src="img/temp/house1.jpg" alt="Картинка дома"/>

                            <div class="_more-button">
                                <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
                            </div>
                        </a>
                    </div>
                    <div class="_content">
                        <a href="#" class="picture-block">
                            <div class="_title-project">Aplauz 2 / Аплауш 2</div>
                            <img src="img/temp/house1.jpg" alt="Картинка дома"/>

                            <div class="_more-button">
                                <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
                            </div>
                        </a>
                    </div>
                    <div class="_content">
                        <a href="#" class="picture-block">
                            <div class="_title-project">Aplauz 2 / Аплауш 2</div>
                            <img src="img/temp/house1.jpg" alt="Картинка дома"/>

                            <div class="_more-button">
                                <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
                            </div>
                        </a>
                    </div>
                    <div class="_content">
                        <a href="#" class="picture-block">
                            <div class="_title-project">Aplauz 2 / Аплауш 2</div>
                            <img src="img/temp/house1.jpg" alt="Картинка дома"/>

                            <div class="_more-button">
                                <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
                            </div>
                        </a>
                    </div>
                    <div class="_content">
                        <a href="#" class="picture-block">
                            <div class="_title-project">Aplauz 2 / Аплауш 2</div>
                            <img src="img/temp/house1.jpg" alt="Картинка дома"/>

                            <div class="_more-button">
                                <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
                            </div>
                        </a>
                    </div>
                    <div class="_content">
                        <a href="#" class="picture-block">
                            <div class="_title-project">Aplauz 2 / Аплауш 2</div>
                            <img src="img/temp/house1.jpg" alt="Картинка дома"/>

                            <div class="_more-button">
                                <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
                            </div>
                        </a>
                    </div>
                    <div class="_content">
                        <a href="#" class="picture-block">
                            <div class="_title-project">Aplauz 2 / Аплауш 2</div>
                            <img src="img/temp/house1.jpg" alt="Картинка дома"/>

                            <div class="_more-button">
                                <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
                            </div>
                        </a>
                    </div>
                    <div class="_content">
                        <a href="#" class="picture-block">
                            <div class="_title-project">Aplauz 2 / Аплауш 2</div>
                            <img src="img/temp/house1.jpg" alt="Картинка дома"/>

                            <div class="_more-button">
                                <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
                            </div>
                        </a>
                    </div>
                    <div class="_content">
                        <a href="#" class="picture-block">
                            <div class="_title-project">Aplauz 2 / Аплауш 2</div>
                            <img src="img/temp/house1.jpg" alt="Картинка дома"/>

                            <div class="_more-button">
                                <div class="show-more-btn-wrapper"><span class="show-more-btn">Подробнее</span></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!--/part with sidebar-->

    </div>

    <div class="slider-to-start">
        <div class="slider-to-start-item">
            <a href="/catalog/odnosemeynyy_odnoetajnyy/ariel_KO" class="slider-to-start-link">
                <div class="ing-content">
                    <img src="img/temp/interior5.jpg" alt=""/>
                </div>
                <div class="slider-to-start-text">
                    Основание дома -тратата
                </div>
            </a>
        </div>

        <div class="slider-to-start-item">
            <a href="/catalog/odnosemeynyy_odnoetajnyy/ariel_KO" class="slider-to-start-link">
                <div class="ing-content">
                    <img src="img/temp/interior5.jpg" alt=""/>
                </div>
                <div class="slider-to-start-text">
                    Закажите проект и будет счастье2
                </div>
            </a>
        </div>

        <div class="slider-to-start-item">
            <a href="/catalog/odnosemeynyy_odnoetajnyy/ariel_KO" class="slider-to-start-link">
                <div class="ing-content">
                    <img src="img/temp/interior5.jpg" alt=""/>
                </div>
                <div class="slider-to-start-text">
                    Закажите проект и будет счастье3
                </div>
            </a>
        </div>

        <div class="slider-to-start-item">
            <a href="/catalog/odnosemeynyy_odnoetajnyy/ariel_KO" class="slider-to-start-link">
                <div class="ing-content">
                    <img src="img/temp/interior5.jpg" alt=""/>
                </div>
                <div class="slider-to-start-text">
                    Закажите проект и будет счастье4
                </div>
            </a>
        </div>

        <div class="slider-to-start-item">
            <a href="/catalog/odnosemeynyy_odnoetajnyy/ariel_KO" class="slider-to-start-link">
                <div class="ing-content">
                    <img src="img/temp/interior5.jpg" alt=""/>
                </div>
                <div class="slider-to-start-text">
                    Закажите проект и будет счастье5
                </div>
            </a>
        </div>
    </div>


</div>
<!--Parallax-->

<div class="parallax-window" data-parallax="scroll" data-image-src="/img/temp/slider-pic-3.jpg"></div>

<div class="centralize">

    <?= $this->render('../layouts/_favorite', []) ?>

    <div class="main-block clearfix">
        <div class="left-block">
            <?= $this->render('../layouts/_newsAnounce', []) ?>
            <?= $this->render('../layouts/_right-menu', []) ?>

        </div>
        <div class="main-text-block ovhidden">
            <?= $mainArticle->full_text ?>
        </div>
    </div>


    <?= $this->render('../layouts/_our-projects', []) ?>

    <?= $this->render('../layouts/_we-suggest', []) ?>

    <div>
        <?= $this->render('../layouts/_parthners', []) ?>
    </div>

</div>

