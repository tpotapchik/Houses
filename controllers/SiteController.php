<?php

namespace app\controllers;

use app\models\Article;
use app\models\CallUsForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $article = Article::getArticle('');
        if ($article) {
            return $this->render('index', ['article' => $article]);
        } else {
            throw new NotFoundHttpException();
        }
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        $article = Article::getArticle('about');
        if ($article) {
            return $this->render('about', ['article' => $article]);
        } else {
            throw new NotFoundHttpException();
        }
    }

    public function actionContacts()
    {
        return $this->render('contacts');
    }

    public function actionCallus()
    {
        $model = new CallUsForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['callUsEmail'])) {
            Yii::$app->getResponse()->data = [];
        } else {
            Yii::$app->getResponse()->data = ['error' => $model->getErrors()];
        }
        Yii::$app->getResponse()->format = Response::FORMAT_JSON;
        Yii::$app->getResponse()->send();
    }
}
