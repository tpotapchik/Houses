<?php

namespace app\modules\admin\controllers;

use app\library\PhotoBehavior;
use app\models\DesignPhoto;
use Yii;
use app\models\Design;
use app\models\DesignSearch;
use yii\db\AfterSaveEvent;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DesignController implements the CRUD actions for Design model.
 */
class DesignController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'delete', 'update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Design models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DesignSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Design model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Design model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Design();
        $modelPhoto = new DesignPhoto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $a = UploadedFile::getInstances($modelPhoto, 'file');
            /** @var UploadedFile $file */
            foreach ($a as $file) {
                $designPhoto = new DesignPhoto();
                $designPhoto->file = $file;
                $designPhoto->design_id = $model->id;
                if ($designPhoto->validate() && $designPhoto->save()) {
                    $p = new PhotoBehavior();
                    $p->init();
                    $p->setFile($file);
                    $p->owner = $designPhoto;
                    $p->afterSave(new AfterSaveEvent());
//                    $file->saveAs($designPhoto->file);
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelPhoto' => $modelPhoto,
                'project_id' => Yii::$app->request->get('project_id', false)
            ]);
        }
    }

    /**
     * Updates an existing Design model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Design model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Design model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Design the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Design::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
