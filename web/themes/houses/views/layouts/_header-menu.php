<?php
/**
 * Houses
 * User: coxa
 * Date: 13.11.14
 * Time: 0:28
 */
use app\models\Category;

$menu = Yii::$app->params['mainMenu'];
foreach ($menu['items'] as $key => $item) {
    if ($item['label'] === 'Каталог проектов') {
        $menu['items'][$key]['items'] = Category::getMenu();
        break;
    }
}
?>
<div class="header-menu">
    <div class="centralize clearfix">
        <?= app\widgets\Menu::widget($menu) ?>
<!--        <ul id="menu">-->
<!--            <li class="page_item">-->
<!--                <a title="Проекты домов в Минске и Беларуси индивидуальные и типовые" href="/"-->
<!--                   class="header-menu-item active">Главная</a>-->
<!--            </li>-->
<!--            <li class="page_item">-->
<!--                <a href="/about" class="header-menu-item">О нас</a>-->
<!--            </li>-->
<!--            <li class="page_item">-->
<!--                <a href="/catalog" class="header-menu-item">Каталог проектов</a>-->
<!--                <ul>-->
<!--                    <li>-->
<!--                        <a href="/catalog/odnosemeynyy_odnoetajnyy">Проекты одноэтажных домов</a></li>-->
<!--                    <li><a href="/catalog/odnosemeynyy_s_jiloy_mansardoy">Проекты домов с жилой мансардой</a></li>-->
<!--                    <li><a href="/catalog/odnosemeynyy_mnogoetajnyy">Проекты многоэтажных домов</a></li>-->
<!--                    <li><a href="/catalog/dachnyy">Проекты дачных домов</a></li>-->
<!--                    <li><a href="/catalog/dvuhsemeynyy">Проекты двухсемейных домов</a></li>-->
<!--                    <li><a href="/catalog/bliznec">Проекты домов близнецов</a></li>-->
<!--                    <li><a href="/catalog/garaji_i_hozyaystvennye_zdaniya">Прокты гаражей и хозяйственных зданий</a>-->
<!--                    </li>-->
<!--                    <li><a href="/catalog/prodavolstvennye_zdaniya">Проекты продовольственных зданий</a></li>-->
<!--                    <li><a href="/catalog/na_4_kvartiry">Проекты домов на 4 квартиры</a></li>-->
<!--                    <li><a href="/catalog/pensiony">Проекты пенсионов</a></li>-->
<!--                    <li><a href="/catalog/besedki">Проекты беседок</a></li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            <li class="page_item"><a href="/minsk-design-interior" class="header-menu-item">Дизайн интерьеров</a></li>-->
<!--            <li class="page_item"><a href="/news" class="header-menu-item">Новости</a></li>-->
<!--            <li class="page_item"><a href="/contacts" class="header-menu-item">Контакты</a></li>-->
<!--        </ul>-->

    </div>
</div>
