<?php
header('HTTP/1.1 503 Service Temporarily Unavailable');
header('Status: 503 Service Temporarily Unavailable');
echo 'Извините, сайт временно не доступен';
ini_set('display_errors', 'Off');
throw new \Exception('Service not available', 503);
if (getenv('APP_ENV') == 'dev' || $_SERVER['HTTP_HOST'] == 'house.loc') {
    // comment out the following two lines when deployed to production
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'dev');
}

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();
