<?php
/**
 * Created by PhpStorm.
 * User: coxa
 * Date: 09.05.15
 * Time: 13:48
 */

namespace app\library;

use dragonjet\opengraph\TwitterCard;
use Yii;
use yii\web\View;

class OpenGraph extends \dragonjet\opengraph\OpenGraph
{
    public function __construct()
    {
        // Load default values
        $this->title = Yii::$app->name;
        $this->site_name = Yii::$app->name;
        $this->url = Yii::$app->urlManager->createAbsoluteUrl(
            array_merge([Yii::$app->controller->getRoute()], Yii::$app->controller->actionParams)
        );
        $this->description = null;
        $this->type = 'article';
        $this->locale = str_replace('-', '_', Yii::$app->language);
        $this->image = null;

        // Twitter Card
        $this->twitter = new TwitterCard;

        // Listed to Begin Page View event to start adding meta
        Yii::$app->view->on(View::EVENT_BEGIN_PAGE, function() {
            // Register required and easily determined open graph data
            Yii::$app->controller->view->registerMetaTag(['property'=>'og:title', 'content'=>$this->title], 'og:title');
            Yii::$app->controller->view->registerMetaTag(['property'=>'og:site_name', 'content'=>$this->site_name], 'og:site_name');
            Yii::$app->controller->view->registerMetaTag(['property'=>'og:url', 'content'=>$this->url], 'og:url');
            Yii::$app->controller->view->registerMetaTag(['property'=>'og:type', 'content'=>$this->type], 'og:type');

            // Locale issafe to be specifued since it has default value on Yii applications
            Yii::$app->controller->view->registerMetaTag(['property'=>'og:locale', 'content'=>$this->locale], 'og:locale');

            // Only add a description meta if specified
            if ($this->description!==null) {
                Yii::$app->controller->view->registerMetaTag(['property'=>'og:description', 'content'=>$this->description], 'og:description');
            }

            // Only add an image meta if specified
            if ($this->image!==null) {
                Yii::$app->controller->view->registerMetaTag(['property'=>'og:image', 'content'=>$this->image], 'og:image');
            }

            $this->twitter->registerTags();
        });
    }
}
