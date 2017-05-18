<?php
/* @var $this yii\web\View */
use app\models\Article;

/** @var app\models\Article $mainArticle */
$mainArticle = Article::getMain();

$this->registerMetaTag(['name' => 'keywords', 'content' => $mainArticle->meta_keywords]);
$this->registerMetaTag(['name' => 'description', 'content' => $mainArticle->meta_description]);
?>

<div class="slider-content">
    <?= $this->render('../layouts/_filter-panel', ['other' => false]) ?>
    <div class="slider">
        <div class="slider-item" style="background-image: url('http://1house.by/wp-content/uploads/2017/01/Perspektiva-12.jpg')">

            <a href="/catalog/odnosemeynyy_odnoetajnyy/ariel" class="slider-link">
                <div class="slider-text">
                    <div class="centralize clearfix">
                        <div class="_title">ARIEL</div>
                        <div class="_content ovhidden">Просторный одноэтажный дом с гаражом для 2 автомобилей.<br>
                            И еще одна строчка
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="slider-item" style="background-image: url('http://1house.by/wp-content/uploads/2017/01/Perspektiva-12.jpg')">
            <a href="/catalog/odnosemeynyy_odnoetajnyy/decyma" class="slider-link">
                <div class="slider-text">
                    <div class="centralize clearfix">
                        <div class="_title">DECYMA</div>
                        <div class="_content ovhidden">Симпатичный одноэтажный дом с гаражом для 2 автомобилей.
                            И еще одна строчка
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="slider-item" style="background-image: url('/img/temp/slider3.jpg')">
            <a href="/catalog/odnosemeynyy_odnoetajnyy/ambrozja" class="slider-link">
                <div class="slider-text">
                    <div class="centralize clearfix">
                        <div class="_title">AMBROZJA</div>
                        <div class="_content ovhidden">Одноэтажный современный дом с гаражом на 2 автомобиля. <br>
                            И еще одна строчка
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="slider-item" style="background-image: url('/img/temp/slider4.jpg')">
            <a href="/catalog/odnosemeynyy_odnoetajnyy/ambrozja_3" class="slider-link">
                <div class="slider-text">
                    <div class="centralize clearfix">
                        <div class="_title">AMBROZJA 3</div>
                        <div class="_content ovhidden">Современный и просторный одноэтажный дом с гаражом для 2
                            автомобилей. <br>И еще одна строчка
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="slider-item" style="background-image: url('/img/temp/slider5.jpg')">
            <a href="/catalog/odnosemeynyy_s_jiloy_mansardoy/jezyna" class="slider-link">
                <div class="slider-text">
                    <div class="centralize">
                        <div class="_title">JEŻYNA</div>
                        <div class="_content ovhidden">Опрятный односемейный дом с мансардой. <br> И еще одна строчка
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!--main part-->
    <div class="centralize">
        <div class="main-title">Проекты домов DOBRY DOM</div>
    </div>

    <!--tabs-->
    <div class="tabs-panel-content">
        <div class="centralize">
            <div class="tabs" id="tab-main">
                <a href="#" class="active tab-item">ТОП - 100 </a>
                <a href="#" class="tab-item">Новые</a>
                <a href="#" class="tab-item">Одноэтажные</a>
                <a href="#" class="tab-item">С мансардой</a>
                <a href="#" class="tab-item">Двухэтажные</a>
                <a href="#" class="tab-item">Маленькие</a>
                <a href="#" class="tab-item">Средние</a>
                <a href="#" class="tab-item">Большие</a>
            </div>
        </div>
    </div>
    <div class="centralize">

        <!--part with sidebar-->
        <div class="layout-sidebar">
        <div class="sidebar-wrap">
            <div class="sidebar">
                <ul>
                    <li class="sidebar-item"><a href="#"><span>Проекты</span></a></li>
                    <li class="sidebar-item"><a href="#"><span>Как купить проект дома?</span></a></li>
                    <li class="sidebar-item"><a href="#"><span>Что включает проект?</span></a></li>
                    <li class="sidebar-item"><a href="#"><span>Ландшафтный дизайн</span></a></li>
                </ul>
            </div>

             <div class="sidebar">
                <div class="feedback-form">
                              <form method="POST" action="/">
                                  <input type="hidden" name="" id="sessid" value="">
                                  <input type="hidden" name="" value="">
                                  <div class="form-title">Будьте в курсе <span>событий!</span></div>
                                  <div class="form">
                                      <button type="submit">+</button>
                                      <div>
                                          <input type="email" name="" value="" title="Введите ваш e-mail" placeholder="Введите ваш e-mail">
                                      </div>
                                  </div>
                              </form>
                          </div>
             </div>
             </div>
            <div class="right-block-content-wrapper">
                <div class="right-block-content clearfix">
                    <div class="_content">
                        <a href="project-house.html" class="picture-block">

                            <img src="img/temp/house-new.jpg" alt="Картинка дома"/>

                            <div class="info-block">
                                <div class="_title-project">Aplauz 2 / Аплауш 2
                                    <div class="effectiveArea">150 м<sup>2</sup></div>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="_content">
                        <a href="project-house.html" class="picture-block">

                            <img src="img/temp/house-new.jpg" alt="Картинка дома"/>

                            <div class="info-block">
                                <div class="_title-project">Aplauz 2 / Аплауш 2
                                    <div class="effectiveArea">150 м<sup>2</sup></div>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="_content">
                        <a href="project-house.html" class="picture-block">

                            <img src="img/temp/house-new.jpg" alt="Картинка дома"/>

                            <div class="info-block">
                                <div class="_title-project">Aplauz 2 / Аплауш 2
                                    <div class="effectiveArea">150 м<sup>2</sup></div>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="_content">
                        <a href="project-house.html" class="picture-block">

                            <img src="img/temp/house-new.jpg" alt="Картинка дома"/>

                            <div class="info-block">
                                <div class="_title-project">Aplauz 2 / Аплауш 2
                                    <div class="effectiveArea">150 м<sup>2</sup></div>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="_content">
                        <a href="project-house.html" class="picture-block">

                            <img src="img/temp/house-new.jpg" alt="Картинка дома"/>

                            <div class="info-block">
                                <div class="_title-project">Aplauz 2 / Аплауш 2
                                    <div class="effectiveArea">150 м<sup>2</sup></div>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="_content">
                        <a href="project-house.html" class="picture-block">

                            <img src="img/temp/house-new.jpg" alt="Картинка дома"/>

                            <div class="info-block">
                                <div class="_title-project">Aplauz 2 / Аплауш 2
                                    <div class="effectiveArea">150 м<sup>2</sup></div>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="_content">
                        <a href="project-house.html" class="picture-block">

                            <img src="img/temp/house-new.jpg" alt="Картинка дома"/>

                            <div class="info-block">
                                <div class="_title-project">Aplauz 2 / Аплауш 2
                                    <div class="effectiveArea">150 м<sup>2</sup></div>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="_content">
                        <a href="project-house.html" class="picture-block">

                            <img src="img/temp/house-new.jpg" alt="Картинка дома"/>

                            <div class="info-block">
                                <div class="_title-project">Aplauz 2 / Аплауш 2
                                    <div class="effectiveArea">150 м<sup>2</sup></div>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="_content">
                        <a href="project-house.html" class="picture-block">

                            <img src="img/temp/house-new.jpg" alt="Картинка дома"/>

                            <div class="info-block">
                                <div class="_title-project">Aplauz 2 / Аплауш 2
                                    <div class="effectiveArea">150 м<sup>2</sup></div>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="_content">
                        <a href="project-house.html" class="picture-block">

                            <img src="img/temp/house-new.jpg" alt="Картинка дома"/>

                            <div class="info-block">
                                <div class="_title-project">Aplauz 2 / Аплауш 2
                                    <div class="effectiveArea">150 м<sup>2</sup></div>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="_content">
                        <a href="project-house.html" class="picture-block">

                            <img src="img/temp/house-new.jpg" alt="Картинка дома"/>

                            <div class="info-block">
                                <div class="_title-project">Aplauz 2 / Аплауш 2
                                    <div class="effectiveArea">150 м<sup>2</sup></div>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="_content">
                        <a href="project-house.html" class="picture-block">

                            <img src="img/temp/house-new.jpg" alt="Картинка дома"/>

                            <div class="info-block">
                                <div class="_title-project">Aplauz 2 / Аплауш 2
                                    <div class="effectiveArea">150 м<sup>2</sup></div>
                                </div>

                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!--/part with sidebar-->

        <div class="main-title">Наши преимущества</div>

        <div class="slider-to-start">
            <div class="slider-to-start-item">
                <a href="/catalog/odnosemeynyy_odnoetajnyy/ariel_KO" class="slider-to-start-link">
                    <div class="ing-content">
                        <img src="img/adv1.png" alt=""/>
                    </div>
                    <div class="slider-to-start-text">
                        Опыт свыше <br>
                        10 лет
                    </div>
                </a>
            </div>

            <div class="slider-to-start-item">
                <a href="/catalog/odnosemeynyy_odnoetajnyy/ariel_KO" class="slider-to-start-link">
                    <div class="ing-content">
                        <img src="img/adv2.png" alt=""/>
                    </div>
                    <div class="slider-to-start-text">
                        Комплексный <br>подход
                    </div>
                </a>
            </div>

            <div class="slider-to-start-item">
                <a href="/catalog/odnosemeynyy_odnoetajnyy/ariel_KO" class="slider-to-start-link">
                    <div class="ing-content">
                        <img src="img/adv3.png" alt=""/>
                    </div>
                    <div class="slider-to-start-text">
                        Авторский <br>надзор
                    </div>
                </a>
            </div>

            <div class="slider-to-start-item">
                <a href="/catalog/odnosemeynyy_odnoetajnyy/ariel_KO" class="slider-to-start-link">
                    <div class="ing-content">
                        <img src="img/adv4.png" alt=""/>
                    </div>
                    <div class="slider-to-start-text">
                        Всё <br>официально
                    </div>
                </a>
            </div>
        <div class="slider-to-start-item">
                <a href="/catalog/odnosemeynyy_odnoetajnyy/ariel_KO" class="slider-to-start-link">
                    <div class="ing-content">
                        <img src="img/adv4.png" alt=""/>
                    </div>
                    <div class="slider-to-start-text">
                         2 Всё <br>официально
                    </div>
                </a>
            </div>

        </div>

    </div>
</div>


<!--Parallax-->

<div class="parallax-window" data-parallax="scroll" data-image-src="/img/temp/parallax-bg.png">
    <div class="parallax-window-container">
        <div class="shadow"></div>
        <div class="parallax-description centralize">
            <div class="txt">
                <a class="title" href="#" title="Стройте с нами">Стройте с нами</a>
            </div>
        </div>
    </div>
</div>
<!--/Parallax-->


<div class="centralize">

<!--<?= $this->render('../layouts/_popular', []) ?>-->
<!-do later and _delete html below-->

<div class="main-block-interior clearfix">
            <a class="interior-block" href="/catalog/odnosemeynyy_s_jiloy_mansardoy/lara_3-foto.html"><img src="/images/7a1/d33/bb59447ecc033cc00129837e7e-327x206.jpg" alt=""></a>
</div>




    <?= $this->render('../layouts/_favorite', []) ?>

    <div class="common-block clearfix">
        <div class="left-block">
            <!--<?= $this->render('../layouts/_newsAnounce', []) ?>
            <?= $this->render('../layouts/_right-menu', []) ?>-->

             <!--место для баннеров-->
            <div class="banners-content clearfix">
            <div>Место для баннера 1</div>
            <div>Место для баннера 2</div>
            </div>

        </div>
        <div class="main-text-block ovhidden">
        <?= $this->render('../layouts/_newsAnounce', []) ?>
            <?= $mainArticle->full_text ?>
        </div>
    </div>



    <!--<?= $this->render('../layouts/_our-projects', []) ?>

    <?= $this->render('../layouts/_we-suggest', []) ?>-->

    <div>
        <?= $this->render('../layouts/_parthners', []) ?>
    </div>

</div>

