<?php

/* @var $this yii\web\View */

$this->registerJsFile('http://api-maps.yandex.ru/2.1/?lang=ru_RU', ['position' => \yii\web\View::POS_BEGIN]);

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
$contacts = Yii::$app->params['contacts'];
?>
<script>
    var myMap, myPlacemark, MyBalloonLayout;

    ymaps.ready(init);

    function init() {
        myMap = new ymaps.Map('officeMap', {
            center: [53.925486, 27.507860],
            zoom: 16,
            controls: []
        });

        MyBalloonLayout = ymaps.templateLayoutFactory.createClass(
            '<div class="contacts-popup">'
            + '<img src="/img/logo.png" alt="" style="width: 100px; height: 39px"/>'
            + '<?= $contacts['address'] ?>'
            + '<br><br>'
            + 'Тел: <?= $contacts['phone1'] ?><br>'
            + 'Тел: <?= $contacts['phone2'] ?><br>'
            + 'E-mail: <a href="mailto:<?= $contacts['email'] ?>"><?= $contacts['email'] ?></a>'
            + '</div>', {

                build: function () {
                    this.constructor.superclass.build.call(this);
                    this._$element = $('.contacts-popup', this.getParentElement());
                    this.applyElementOffset();
                },
                clear: function () {
                    this.constructor.superclass.clear.call(this);
                },
                onSublayoutSizeChange: function () {
                    MyBalloonLayout.superclass.onSublayoutSizeChange.apply(this, arguments);
                    if (!this._isElement(this._$element)) {
                        return;
                    }
                    this.applyElementOffset();
                    this.events.fire('shapechange');
                },
                applyElementOffset: function () {
                    this._$element.css({
                        left: -(this._$element[0].offsetWidth + 25),
                        top: -(this._$element[0].offsetHeight + 42) / 2
                    });
                },
                getShape: function () {
                    if (!this._isElement(this._$element)) {
                        return MyBalloonLayout.superclass.getShape.call(this);
                    }
                    var position = this._$element.position();
                    return new ymaps.shape.Rectangle(new ymaps.geometry.pixel.Rectangle([
                        [position.left, position.top],
                        [
                            position.left + this._$element[0].offsetWidth,
                            position.top + this._$element[0].offsetHeight
                        ]
                    ]));
                },
                _isElement: function (element) {
                    return element && element[0];
                }
            });

        myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
            hintContent: ''
        }, {
//        iconLayout: 'default#image',
//        iconImageHref: 'img/pin-contacts.png',
//        iconImageSize: [87, 92],
//        iconImageOffset: [-38, -90],
            balloonShadow: false,
            balloonLayout: MyBalloonLayout,
            balloonPanelMaxMapArea: 0,
            hideIconOnBalloonOpen: false
        });

        myMap.geoObjects.add(myPlacemark);

        myMap.events.add('click', function () {
            myMap.balloon.close(true);
        });
    }
</script>
  <div class="centralize">
            <div class="office-block-map">
                <div class="connect-map">С нами легко связаться:</div>
                <img src="img/logo.png" alt="" style="width: 100px; height: 39px"/><br><br>
               <?= $contacts['address'] ?><br><br>
                <b><?= $contacts['phone1'] ?></b><br>
                <b><?= $contacts['phone2'] ?><br><br>
                E-mail: <a href="mailto:<?= $contacts['email'] ?>"><?= $contacts['email'] ?></a>

            </div>
            <div id="officeMap">
            </div>
  </div>
