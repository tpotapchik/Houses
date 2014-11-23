<?php
if (getenv('APP_ENV') == 'dev') {
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'pgsql:host=localhost;dbname=home',
        'username' => 'home',
        'password' => 'home',
        'charset' => 'utf8',
        'enableSchemaCache' => true,
        'enableQueryCache' => true
    ];
} else {
    //production
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=mysql5.activeby.net;dbname=domtut',
        'username' => 'dom',
        'password' => '6nip2Ujs',
        'charset' => 'utf8',
    ];
}
