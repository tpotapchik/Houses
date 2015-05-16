<?php
/**
 * Created by PhpStorm.
 * User: coxa
 * Date: 15.05.15
 * Time: 23:55
 */

namespace app\controllers;


use Gregwar\Image\Image;
use Symfony\Component\Filesystem\Filesystem;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class ImagesController extends Controller
{
    public function actionIndex($path)
    {
        $dFs = new Filesystem();

        $prePath = \Yii::getAlias('@webroot').'/images/';
        $path = $prePath.$path;

        if (!$dFs->exists($path)) {
            if (!preg_match('/(.+)-(\d+?)x(\d+?)\.(.+)$/', $path, $matches)) {
                throw new NotFoundHttpException();
            } elseif (!$dFs->exists($matches[1].'.'.$matches[4])) {
                throw new NotFoundHttpException();
            } else {
                $fullFilePath = $matches[1].'.'.$matches[4];

                $imgTool = new Image($fullFilePath);
                //resize
                $imgTool->zoomCrop($matches[2], $matches[3]);

                //save new file
                $r = $imgTool->save($path);

                //return file
                $this->setHttpHeaders();
                Yii::$app->response->format = Response::FORMAT_RAW;
                Yii::$app->response->stream = fopen($path, 'r');
                return Yii::$app->response;
            }
        }
        return $path;
    }

    protected function setHttpHeaders()
    {
        $time = date('r', strtotime("+1 day"));
        Yii::$app->getResponse()->getHeaders()
            ->set('Expires', $time)
            ->set('Cache-Control', 'max-age=86400')
            ->set('Content-Transfer-Encoding', 'binary')
            ->set('Content-type', 'image/jpg');
    }
}