<?php
if (getenv('APP_ENV') == 'dev') {
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=127.0.0.1;dbname=houses',
        'username' => 'vagrant',
        'password' => 'vagrant',
        'charset' => 'utf8',
    ];
} else {
    //production
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=127.0.0.1;dbname=houses',
        'username' => 'vagrant',
        'password' => 'vagrant',
        'charset' => 'utf8',
    ];
}
