<?php

namespace app\controllers;

use app\models\Article;
use app\models\Category;
use app\models\CategorySearch;
use app\models\ContactForm;
use app\models\FilterPanel;
use app\models\Project;
use app\models\ProjectSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CatalogController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search([]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
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

    /**
     * @param $category
     * @param $numCat
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($category, $numCat)
    {
        /** @var Project $model */
        $model = Project::findOne(['numCat' => $numCat]);
        if (is_null($model) /*|| $model->category->url != $category*/) {
            throw new NotFoundHttpException('Project not exists');
        }
        return $this->render('view', ['model' => $model]);
    }

    public function actionCategory($category_url)
    {
        $category = Category::findOne(['url' => $category_url]);
        return $this->render('categoryView', ['category' => $category]);
    }

    public function actionOrderProject()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->sendEmail(Yii::$app->params['callUsEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            $article = Article::getArticle('order-project');
            return $this->render('orderProject', [
                'model' => $model,
                'article' => $article
            ]);
        }
    }

    public function actionShowArticle($article_url)
    {
        $specialPagesUrls = [
            'actionOrderProject' => 'order-project'
        ];

        if ($key = array_search($article_url, $specialPagesUrls)) {
            return $this->$key();
        } else {
            if ($article = Article::getArticle($article_url)) {
                return $this->render('article', ['article' => $article]);
            } else {
                throw new NotFoundHttpException();
            }
        }
    }
}
