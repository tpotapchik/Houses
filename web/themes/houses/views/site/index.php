<?php
/* @var $this yii\web\View */
$this->title = 'DOMY';

?>

<div class="slider-content">
    <?= $this->render('../layouts/_filter-panel', ['other' => false]) ?>
    <div class="slider">
        <div class="slider-item" style="background-image: url('/img/temp/slider.jpg')">
            <a href="/catalog/odnosemeynyy_odnoetajnyy/ariel_KO" class="slider-link">
                <div class="slider-text">
                    <div class="centralize">
                        <div class="_title">ARIEL</div>
                        <div class="_content ovhidden">Просторный одноэтажный дом с гаражом для 2 автомобилей. В составе помещений гостиная с выходом на террасу, кухня-столовая, 3 спальни, 2 ванные комнаты и гостевой санузел.
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="slider-item" style="background-image: url('/img/temp/slider2.jpg')">
            <a href="project-house.html" class="slider-link">
                <div class="slider-text">
                    <div class="centralize">
                        <div class="_title">АЛЬФА</div>
                        <div class="_content ovhidden">Стильный двухэтажный дом в средиземноморском стиле.
                            Запроектирован гараж на 1 авто и несколько террас. На первом этаже - гостиная-
                            столовая, кухня с кладовой, санузел.
                            Второй этаж включает 3 спальни, из них 2 с гардеробными, а также ванную комнату.
                        </div>
                    </div>

                </div>
            </a>
        </div>

        <div class="slider-item" style="background-image: url('/img/temp/slider3.jpg')">
            <a href="project-house.html" class="slider-link">
                <div class="slider-text">
                    <div class="centralize">
                        <div class="_title">АГАТ</div>
                        <div class="_content ovhidden">Стильный двухэтажный дом в средиземноморском стиле.
                            Запроектирован гараж на 1 авто и несколько террас. На первом этаже - гостиная-
                            столовая, кухня с кладовой, санузел.
                            Второй этаж включает 3 спальни, из них 2 с гардеробными, а также ванную комнату.
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
            <div class="list-news">
                <h2>Новости</h2>
                <ul class="list-news-content">
                    <li><a href="#">Где миллионеру купить яхту этой осенью</a></li>
                    <li><a href="#">В России моугт запретить импорт автомобилей из Европы</a></li>
                    <li><a href="#">Чемпион Беларуси "Неман" стартовал с четырех поражений подряд</a></li>
                    <li><a href="#">Предсказания Муаммара Каддафи о судьбе Ливии начинают сбываться спустя три года после его сметри</a></li>
                    <li><a href="#">МИД РФ:Контактная группа по Украине собрется в "самое ближайшее время"</a></li>
                </ul>
                <span class="square"></span>
            </div>
            <div class="right-menu">
                <a href="#">Как заказать проект?</a><a href="#">Состав проектов</a><a href="#">Индивидуальные проекты</a><a href="#">3D прогулки</a>
            </div>


        </div>
        <div class="main-text-block ovhidden">
            <h2>Главная</h2>
            Помните, что критерии отбора проектов будет навязывать сюжет. Таким образом, еще до того, договор проект стоит проверить для выбранной посылок
            зонирования. Количество этажей, ската крыши, высота конька и других специфических параметров может помешать вам получить Экстракт из местного плана
            развития или зонирования можно сделать вывод, даже прежде чем покупать участок, потому что их требования точно определить
            рамки, в котором они должны войти в выбранный проект. Первые шаги должны быть направлены в соответствующий офис отдела архитектуры города,
            муниципалитета, района или округа, чтобы получить информацию о том земля, на которой вы собираетесь строить дом, включает принят местный план
            развития.
            Если план охватывает землю с целью удовлетворения условия его развития достаточно применить для выписки из плана. Если выбранная область не принят
            текущий план зонирования, муниципалитет может определить зонирование по решению. Подача заявки на зонирования и землепользования будет более
            трудоемким Вам нужно собрать необходимые вложения, такие как:
            опираясь на кадастровой карте земли площадью соответствующий район и ближайшее окружение,
            Отрывок из крепостной книги для своих и соседних участков, и только затем заполнить и отправить заявку для принятия решения.
            Данные, представленные в приложении показательны. На данном этапе, есть еще необходимость выбора конкретного проекта, но это стоит уже уточнил свои
            ожидания, основанные на проекте, что наиболее по душе.
            Завершение просьбе облегчит наш сайт: www.domywstylu.pl и и каталог «по-домашнему», где четко описанную каждый проект: количество этажей и уровень
            первого этажа фундамента, форму крыши и угол наклона, полезная и здания, высота гребня и Другие параметры, которые следует указать в заявке. Выдача
            обязательное решение офиса будет определять, что будет построено на участке.
        </div>
    </div>

    <?= $this->render('../layouts/_parthners', []) ?>
</div>
<!--/main part-->