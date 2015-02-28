<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'timeZone' => 'Europe/Minsk',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'dskjfh4j3645yvsdpoj409tiedfokg_dafg',
        ],
        'urlManager'  => [
            'enablePrettyUrl' => true,
//            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                'about' => 'site/about',
                'catalog/pages/<article_url:[[:word:]-_]+>' => 'catalog/show-article',
                '/' => 'site/index',
                'contacts' => 'site/contacts',
                'catalog' => 'catalog/index',
                'catalog/<category:[[:word:]-_]+>/<numCat:[[:word:]-]+>' => 'catalog/view',
                'catalog/search' => 'catalog/search',
                'catalog/<category_url:[[:word:]-_]+>' => 'catalog/category',
                'news' => 'news/index',
                'news/<article_url:[[:word:]-_]+>' => 'news/view',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
//            'useFileTransport' => true,
//            'transport' => [
//                'class' => 'Swift_SmtpTransport',
//                'host' => 'ox20m.atservers.net',
//                'username' => 'info@dom-tut.by',
//                'password' => 'jz}QT7_vua',
//                'port' => '25',
//                'encryption' => 'tls',
//                'AuthMode' => 'login'
//            ],
            'transport' => [
                 'class' => 'Swift_MailTransport', // это обертка mail()
                 'constructArgs' => ['-f info@dom-tut.by'],
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => [
                        '@webroot/themes/houses/views',

                    ]
                ],
            ],
        ],
        'i18n' => [
            'translations' => [
                'house*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '@app/messages',
                    //'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'house'       => 'house.php',
                        'house/error' => 'error.php',
                    ],
                ],
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '@app/messages',
                    //'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app'       => 'app.php',
                    ],
                ],
            ],
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
