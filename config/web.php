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
                'catalog/<category:[[:word:]-_]+>/<numCat:[[:word:]-]+>-foto.html' => 'design/view',
                'minsk-design-interior' => 'design/index',
                'catalog/search' => 'catalog/search',
                'catalog/<category_url:[[:word:]-_]+>' => 'catalog/category',
                'news' => 'news/index',
                'news/<article_url:[[:word:]-_]+>' => 'news/view',
                ['pattern' => 'sitemap', 'route' => 'sitemap/default/index', 'suffix' => '.xml'],
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
                 'constructArgs' => [null],
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
        'opengraph' => [
            'class' => 'dragonjet\opengraph\OpenGraph',
            'site_name' => 'Проектная мастерская Dom-Tut.by'
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
        'sitemap' => [
            'class' => 'himiklab\sitemap\Sitemap',
            'models' => [
                // your models
                'app\models\Article',
                'app\models\Project'
            ],
            'urls'=> [
                // your additional urls
//                [
//                    'loc' => '/news/index',
//                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
//                    'priority' => 0.8,
//                    'news' => [
//                        'publication'   => [
//                            'name'          => 'Example Blog',
//                            'language'      => 'en',
//                        ],
//                        'access'            => 'Subscription',
//                        'genres'            => 'Blog, UserGenerated',
//                        'publication_date'  => 'YYYY-MM-DDThh:mm:ssTZD',
//                        'title'             => 'Example Title',
//                        'keywords'          => 'example, keywords, comma-separated',
//                        'stock_tickers'     => 'NASDAQ:A, NASDAQ:B',
//                    ],
//                    'images' => [
//                        [
//                            'loc'           => 'http://example.com/image.jpg',
//                            'caption'       => 'This is an example of a caption of an image',
//                            'geo_location'  => 'City, State',
//                            'title'         => 'Example image',
//                            'license'       => 'http://example.com/license',
//                        ],
//                    ],
//                ],
            ],
            'enableGzip' => true, // default is false
//            'cacheExpire' => 10, // 1 second. Default is 24 hours
        ]
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
