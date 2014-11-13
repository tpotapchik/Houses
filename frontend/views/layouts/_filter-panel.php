<?php
/**
 * Houses
 * User: coxa
 * Date: 13.11.14
 * Time: 0:31
 */
?>
<div class="filter-panel <?= $other?'other-page':'' ?>">
    <div class="_title">НАЙТИ ПРОЕКТ МЕЧТЫ</div>
    <form action="#">
        <div class="centralize clearfix">
            <div class="filter-column">
                <div class="filter-row clearfix">
                    <label>Полезная площадь</label>

                    <div class="small-input margin-r">от<input type="text"/>м<sup>2</sup></div>
                    <div class="small-input">до<input type="text"/>м<sup>2</sup></div>
                </div>
                <div class="filter-row clearfix">
                    <label>Категория проекта</label>
                    <select name="" class="component-select medium-select">
                        <option value="">Все</option>
                        <option value="">Эксклюзивные проекты</option>
                        <option value="">Современные дома</option>
                        <option value="">Одноэтажные дома</option>
                        <option value="">Двухэтажные дома</option>
                        <option value="">Дома с мансардой</option>
                        <option value="">Дачные дома</option>
                        <option value="">Дома на 2 семьи</option>
                        <option value="">Многоквартирные дома</option>
                        <option value="">Гостиницы</option>
                        <option value="">Экономичные дома</option>
                        <option value="">Дома с плоской крышей</option>
                        <option value="">Популярные проекты</option>
                    </select>
                </div>
            </div>
            <div class="filter-column">
                <div class="filter-row clearfix">
                    <div class="component-checkbox _label1">
                        <input type="checkbox" id="ch1"/>
                        <label for="ch1">Гараж</label>
                    </div>
                    <div class="component-checkbox _label2">
                        <input type="checkbox" id="ch2"/>
                        <label for="ch2">Цокольный этаж</label>
                    </div>
                </div>
                <div class="filter-row without-m clearfix">
                    <label>Название проекта</label>
                    <input type="text" class="filter-input"/>
                </div>
            </div>
            <div class="filter-submit js-submit-form">
                <button type="submit"><span>Найти!</span></button>
            </div>


        </div>
    </form>

</div>