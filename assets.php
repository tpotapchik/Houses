<?php
/**
 * Configuration file for the "yii asset" console command.
 */

// In the console environment, some path aliases may not exist. Please define these:
 Yii::setAlias('@webroot', __DIR__ . '/web');
 Yii::setAlias('@web', '/');

return [
    // Adjust command/callback for JavaScript files compressing:
    'jsCompressor' => 'java -jar '.__DIR__.'/vendor/packagist/closurecompiler-bin/bin/compiler.jar --js {from} --js_output_file {to}',
    // Adjust command/callback for CSS files compressing:
    'cssCompressor' => 'java -jar '.__DIR__.'/vendor/packagist/yuicompressor-bin/bin/yuicompressor.jar --type css {from} -o {to}',
    // The list of asset bundles to compress:
    'bundles' => [
         'app\assets\AppAsset',
         'yii\web\YiiAsset',
         'yii\web\JqueryAsset',
         'yii\captcha\CaptchaAsset',
         'yii\validators\ValidationAsset',
         'yii\widgets\ActiveFormAsset'
    ],
    // Asset bundle for compression output:
    'targets' => [
        'all' => [
            'class' => 'yii\web\AssetBundle',
            'basePath' => '@webroot/assets',
            'baseUrl' => '@web/assets',
            'js' => 'js/all.js',
            'css' => 'css/all.css',
        ],
    ],
    // Asset manager configuration:
    'assetManager' => [
        'basePath' => '@webroot/assets',
        'baseUrl' => '@web/assets',
    ],
];