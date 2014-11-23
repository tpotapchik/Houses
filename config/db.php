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
        'dsn' => 'mysql:host=localhost;dbname=test',
        'username' => 'user1118294_dom',
        //'password' => '6nip2Ujs',
        'charset' => 'utf8',
    ];
}
