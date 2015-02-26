<?php

namespace app\controllers;

use app\models\Article;
use yii\web\NotFoundHttpException;

class NewsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($article_url)
    {
        if ($article = Article::getArticle($article_url, 2)) {
            return $this->render('view', ['article' => $article]);
        } else {
            throw new NotFoundHttpException();
        }
    }

}
