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
        $modelForm = new FilterPanel();

        if ($modelForm->load(Yii::$app->request->get()) && $modelForm->validate()) {
            $searchModel = new ProjectSearch();
            $dataProvider = $searchModel->searchFilter($modelForm);
        } else {
            //todo remove that
            var_dump($modelForm->getErrors());
            die;
        }

        return $this->render('search', ['model' => $modelForm, 'dataProvider' => $dataProvider]);
    }

    public function actionView($category, $numCat)
    {
        $model = Project::findOne(['numCat' => $numCat]);
        return $this->render('view', ['model' => $model]);
    }

    public function actionCategory($category)
    {
        throw new \Exception('not implemented method');
    }
}
