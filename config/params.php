<?php

return [
    'mainMenu' => [
        'items' => [
            ['label' => 'Главная', 'url' => ['site/index']],
            ['label' => 'О нас', 'url' => ['site/about']],
            ['label' => 'Каталог проектов', 'url' => ['catalog/index']],
//            ['label' => 'Дизайн интерьеров', 'url' => ['site/index']],
//            ['label' => 'Новости', 'url' => ['site/index']],
            ['label' => 'Контакты', 'url' => ['site/contacts']],
        ]
    ],
    'contacts' => [
        'email' => 'info@dom-tut.by',
        'phone1' => '+375 17 677 10 59',
        'phone2' => '+375 29 677 10 59',
        'skype' => 'skypedomby',
        'address' => '220035, Республика Беларусь,<br>г.Минск, ул. Тимирязева, 67, 10 этаж, оф.1009'
    ],
    'callUsEmail' => 'info@dom-tut.by',
    'nbrbUrl' => 'http://www.nbrb.by/Services/XmlExRates.aspx'
];
