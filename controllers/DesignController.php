<?php

namespace app\controllers;

use app\models\Article;
use app\models\Project;
use yii\web\NotFoundHttpException;

class DesignController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $article = Article::getArticle('minsk-design-interior');
        return $this->render('index', ['article' => $article]);
    }

    public function actionView($category, $numCat)
    {
        /** @var Project $projectModel */
        $projectModel = Project::findOne(['numCat' => $numCat]);
        if (is_null($projectModel) || !$projectModel->hasDesigns()) {
            throw new NotFoundHttpException('Project not exists');
        }
        return $this->render('view', ['design' => $projectModel->getDesign()->one()]);
    }
}
