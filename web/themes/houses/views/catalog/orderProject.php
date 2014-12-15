<?php

/* @var $this yii\web\View */
use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Как заказать проект ';
$this->params['breadcrumbs'][] = ['label' => Yii::t('house', 'Catalog Projects'), 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = $this->title;

Yii::$app->params['mainMenu']['items'][2]['active'] = true;
?>

<?= $this->render('../layouts/_filter-panel', ['other' => true]) ?>

<!--main part-->
<div class="centralize">

    <?= $this->render('../layouts/_breadcrumbs', []) ?>

    <div class="main-title">ЗАКАЗАТЬ ТИПОВОЙ ПРОЕКТ</div>
    <div class="main-block clearfix">
        <div class="right-block right">
            <?= $this->render('../layouts/_right-menu', []) ?>
        </div>
        <div class="main-text-block ovhidden">
            <img src="/img/temp/project.jpg" class="main-pic" alt="Заказать типовой проект"/>
            <div class="main-text-block-wrap clearfix">
                <div class="news-short-info">
                    • Абсолютно все типовые проекты, независимо от того в какой стране были разработаны, должны быть адаптированы к условиям конкретного
                    земельного участка, а именно, необходимо произвести привязку проекта к местности и выполнить адаптацию фундаментов проекта под существующие
                    на земельном участке грунты.
                    <br/><br/>

                    • Если Вы не уверены, что выбранный проект дома будет правильно размещен на Вашем земельном участке, то обязательно обратитесь к нашим
                    специалистам за профессиональной консультацией и мы с удовольствием поможем определить оптимальный вариант. Для этого необходимо
                    предоставить копию гос. акта или топосъемку.<br/><br/>

                    • Мы предоставляем бесплатные консультации на всех этапах строительства домов по нашим типовым и индивидуальным проектам независимо от
                    местонахождения застройщика (телефон, скайп, электронная почта или личная встреча в нашем офисе).<br/><br/>
                </div>
                <div class="news-head">
                    <span class="_text"> Вы можете заказать наши типовые проекты:</span>
                </div>
                <div class="news-short-info">
                    • При личной встрече в нашем офисе<br/>
                    • С помощью удаленного доступа (телефон, электронная почта, форма заказа на сайте)<br/>
                    • У наших официальных дилеров<br/><br/>

                    Самый простой и удобный способ заказа - выбрать любой понравившийся на сайте проект, после чего нажать кнопку «ЗАКАЗАТЬ ПРОЕКТ» и заполнить
                    простую форму заказа. После получения заявки на проект наши специалисты свяжутся с Вами, чтобы подтвердить заказ и предоставить необходимые
                    консультации.
                </div>

            </div>
            <div class="main-text-block-wrap clearfix">
                <div class="news-head">
                    <span class="_text">Для оформления договора необходимо предоставить:</span>
                </div>
                <div class="news-short-info">
                    • Паспортные данные<br/>
                    • Контактный номер телефона<br/>
                    • Фактический адрес для доставки проекта курьером<br/>
                    • Указать название и версию проекта (оригинальная или зеркальная)
                </div>

            </div>
            <div class="main-text-block-wrap clearfix">
                <div class="news-head">
                    <span class="_text">Оплата выбранного проекта:</span>
                </div>
                <div class="news-short-info">Оплату можно произвести в гривнах или другой валюте:<br/><br/>

                    • наличным расчетом у нас в офисе<br/>
                    • банковским переводом (реквизиты и счет для оплаты высылаем Вам на электронную почту)<br/>
                    • для клиентов из России счет будет отправлен в российских рублях или евро.<br/>
                </div>

            </div>
            <div class="main-text-block-wrap clearfix">
                <div class="news-head">
                    <span class="_text">Подготовка Вашего проекта и доставка:</span>
                </div>
                <div class="news-short-info">Подготовка документации начинается с момента оплаты проекта и занимает от 2 до 30 дней, в зависимости от пожеланий
                    к заказу. Проект будет отправлен Вам курьерской службой доставки и передан "лично в руки". Также Вы можете посетить наш офис в г. Киеве и
                    получить свой проект лично. Доставка типовых и индивидуальных проектов по всей территории стран СНГ выполняется за счет нашей компании.
                </div>

            </div>
            <div class="main-text-block-wrap clearfix">
                <div class="news-head">
                    <span class="_text">При стандартном заказе типового проекта Вы получаете:</span>
                </div>
                <div class="news-short-info">
                    • Готовый проект для застройщика (2 одинаковых экземпляра).<br/>
                    • Привязка проекта к Вашему земельному участку (2 одинаковых экземпляра).
                </div>

            </div>
            <div class="main-text-block-wrap clearfix">
                <div class="news-head">
                    <span class="_text">Дополнительно Вы можете заказать:</span>
                </div>
                <div class="news-short-info">
                    • Адаптацию и пересчет фундаментов под личный бюджет и условия земельного участка<br/>
                    • Внесение архитектурных и конструктивных изменений<br/>
                    • Полную адаптацию типового проекта в зависимости от своих пожеланий к материалам<br/>
                    • Индивидуальный проект на основе личных предпочтений к архитектурному стилю<br/>
                    • Расчет сметы и строительство дома
                </div>

            </div>
        </div>
        <div class="feedback-block-wrapper">
            <div class="feedback-block">
                <div class="message">Спасибо! Мы свяжемся с вами<br> в ближайшее время.</div>
                <div class="_title">ФОРМА ОБРАТНОЙ СВЯЗИ</div>

                <?php $form = ActiveForm::begin([
                    'method' => 'post',
                    'enableClientValidation' => true,
                ]); ?>
                <div class="form-row">Введите свое имя</div>
                <?= $form->field($model, 'name', [
                    'template' => "{input}\n{hint}\n{error}",
                    'errorOptions' => [
                        'class' => 'error'
                    ],
                    'inputOptions' => [
                        'class' => 'popup-input',
                        'placeholder' => 'Вася',

                    ]
                ]) ?>

                <div class="form-row">Введите тему сообщения</div>
                <?= $form->field($model, 'subject', [
                    'template' => "{input}\n{hint}\n{error}",
                    'errorOptions' => [
                        'class' => 'error'
                    ],
                    'inputOptions' => [
                        'class' => 'popup-input',
                        'placeholder' => 'Хочу сотрудничать'
                    ]
                ]) ?>

                <div class="form-row">Введите ваш электронный адрес</div>
                <?= $form->field($model, 'email', [
                    'template' => "{input}\n{hint}\n{error}",
                    'errorOptions' => [
                        'class' => 'error'
                    ],
                    'inputOptions' => [
                        'class' => 'popup-input',
                        'placeholder' => 'vasya@fake-site.com'
                    ]
                ]) ?>

                <div class="form-row">Напишите комментарий</div>
                <?= $form->field($model, 'body', [
                    'template' => "{input}\n{hint}\n{error}",
                    'errorOptions' => [
                        'class' => 'error'
                    ],
                    'inputOptions' => [
                        'class' => 'popup-textarea',
                        'cols' => '30',
                        'rows' => '10'
                    ]
                ])->textArea() ?>

                <div class="form-row">Введите символы с картинки</div>
                <?= $form->field($model, 'verifyCode', [
                    'template' => "{hint}\n{input}\n{error}",
                    'inputOptions' => [],
                    'errorOptions' => [
                        'class' => 'error'
                    ],
                ])->hint('Чтоб обновить картинку - нажмите на нее')->widget(Captcha::className(), [
                    'options' => ['class' => 'popup-input',]
                ]) ?>
                <?= Html::submitButton('ОТПРАВИТЬ', ['class' => 'order-call-btn', 'name' => 'contact-button', 'id' => 'js-submit']) ?>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>

    <?= $this->render('../layouts/_our-projects', []) ?>

    <?= $this->render('../layouts/_parthners', []) ?>
</div>
