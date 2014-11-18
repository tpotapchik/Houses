<?php
if ($_SERVER['HTTP_HOST'] == 'house.loc') {
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=yii2basic',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
    ];
} else {
    //production
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=pgsql1.activeby.net;dbname=domtut',
        'username' => 'dom',
        'password' => '6nip2Ujs',
        'charset' => 'utf8',
    ];
}
