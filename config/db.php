<?php
if ($_SERVER['HTTP_HOST'] == 'house.loc') {
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'pgsql:host=localhost;dbname=home',
        'username' => 'home',
        'password' => 'home',
        'charset' => 'utf8',
    ];
} else {
    //production
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'pgsql:host=pgsql1.activeby.net;dbname=domtut',
        'username' => 'dom',
        'password' => '6nip2Ujs',
        'charset' => 'utf8',
    ];
}
