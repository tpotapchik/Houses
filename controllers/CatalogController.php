<?php

namespace app\controllers;

use app\models\FilterPanel;
use app\models\Project;
use app\models\ProjectSearch;
use Yii;
use yii\web\Controller;

class CatalogController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSearch()
    {
        $dataProvider = null;
        $model = new FilterPanel();

        if ($model->load(Yii::$app->request->get()) && $model->validate()) {
            $searchModel = new ProjectSearch();
            $dataProvider = $searchModel->searchFilter($model);
        } else {
            //todo remove that
            var_dump($model->getErrors());
            die;
        }


        return $this->render('search', ['model' => $model, 'dataProvider' => $dataProvider]);
    }

    public function actionView($numCat)
    {
        $model = Project::findOne(['numCat' => $numCat]);
        return $this->render('view', ['model' => $model]);
    }
}

