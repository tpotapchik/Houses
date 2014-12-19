<?php
if (getenv('APP_ENV') == 'dev') {
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=dev_house',
        'username' => 'dev',
        'password' => 'dev',
        'charset' => 'utf8',
        'enableSchemaCache' => true,
        'enableQueryCache' => true
    ];
} else {
    //production
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=10.159.247.57;dbname=user1118294_domtut',
        'username' => 'dom',
        'password' => 'dom',
        'charset' => 'utf8',
    ];
}
