<?php
/* @var $this yii\web\View */
    $this->title = 'Дизайн интерьеров';
    $this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('../layouts/_filter-panel', ['other' => true]) ?>
<!--main part-->
<div class="centralize">
    <?= $this->render('../layouts/_breadcrumbs', []) ?>

    <div class="main-title">ИНТЕРЬЕРЫ ПОПУЛЯРНЫХ ПРОЕКТОВ</div>
    <div class="main-block-interior clearfix">
        <a href="design-page.html" class="interior-block left"><div class="_title">Aga/Ага</div><img src="img/temp/interior1.jpg" alt="Интерьер"/></a>
        <a href="#" class="interior-block left"><div class="_title">Alabaster/Алабастер</div><img src="img/temp/interior2.jpg" alt="Интерьер"/></a>
        <a href="#" class="interior-block left"><div class="_title">Aga/Ага</div><img src="img/temp/interior3.jpg" alt="Интерьер"/></a>
        <a href="#" class="interior-block left"><div class="_title">Aga/Ага</div><img src="img/temp/interior4.jpg" alt="Интерьер"/></a>
        <a href="#" class="interior-block left"><div class="_title">Aga/Ага</div><img src="img/temp/interior5.jpg" alt="Интерьер"/></a>
        <a href="#" class="interior-block left"><div class="_title">Aga/Ага</div><img src="img/temp/interior6.jpg" alt="Интерьер"/></a>
        <a href="#" class="interior-block left"><div class="_title">Aga/Ага</div><img src="img/temp/interior1.jpg" alt="Интерьер"/></a>
        <a href="#" class="interior-block left"><div class="_title">Aga/Ага</div><img src="img/temp/interior2.jpg" alt="Интерьер"/></a>
        <a href="#" class="interior-block left"><div class="_title">Aga/Ага</div><img src="img/temp/interior3.jpg" alt="Интерьер"/></a>
    </div>
    <div class="pagination result clearfix">
        <a href="" class="before"></a><a href="#" class="active">1</a><a href="#">2</a><a href="#">3</a><a href="" class="after"></a>
    </div>


    <div class="main-title">ДИЗАЙН ИНТЕРЬЕРОВ</div>
    <div class="main-block clearfix">
        <div class="right-block right">
            <?= $this->render('../layouts/_right-menu', []) ?>
            <?= $this->render('../layouts/_newsAnounce', []) ?>
        </div>
        <div class="main-text-block ovhidden">
            <h2>Дизайн интерьеров</h2>
            Помните, что критерии отбора проектов будет навязывать сюжет. Таким образом, еще до того, договор проект стоит проверить для выбранной
            посылок
            зонирования. Количество этажей, ската крыши, высота конька и других специфических параметров может помешать вам получить Экстракт из
            местного плана
            развития или зонирования можно сделать вывод, даже прежде чем покупать участок, потому что их требования точно определить
            рамки, в котором они должны войти в выбранный проект. Первые шаги должны быть направлены в соответствующий офис отдела архитектуры города,
            муниципалитета, района или округа, чтобы получить информацию о том земля, на которой вы собираетесь строить дом, включает принят местный
            план
            развития.
            Если план охватывает землю с целью удовлетворения условия его развития достаточно применить для выписки из плана. Если выбранная область не
            принят
            текущий план зонирования, муниципалитет может определить зонирование по решению. Подача заявки на зонирования и землепользования будет более
            трудоемким Вам нужно собрать необходимые вложения, такие как:
            опираясь на кадастровой карте земли площадью соответствующий район и ближайшее окружение,
            Отрывок из крепостной книги для своих и соседних участков, и только затем заполнить и отправить заявку для принятия решения.
            Данные, представленные в приложении показательны. На данном этапе, есть еще необходимость выбора конкретного проекта, но это стоит уже
            уточнил свои
            ожидания, основанные на проекте, что наиболее по душе.
            Завершение просьбе облегчит наш сайт: www.domywstylu.pl и и каталог «по-домашнему», где четко описанную каждый проект: количество этажей и
            уровень
            первого этажа фундамента, форму крыши и угол наклона, полезная и здания, высота гребня и Другие параметры, которые следует указать в заявке.
            Выдача
            обязательное решение офиса будет определять, что будет построено на участке.
        </div>
    </div>

    <?= $this->render('../layouts/_our-projects', []) ?>
    <?= $this->render('../layouts/_parthners', []) ?>
</div>
