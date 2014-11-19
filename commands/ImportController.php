<?php
/**
 * Houses
 * User: coxa
 * Date: 18.11.14
 * Time: 18:34
 */

namespace app\commands;


use app\models\Project;
use yii\console\Controller;

class ImportController extends Controller
{
    public function actionIndex()
    {
        echo 'hello import xml' . PHP_EOL;
        $xml = simplexml_load_file(\Yii::$app->basePath . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'projekty.xml');
        $xml_array = unserialize(serialize(json_decode(json_encode((array) $xml), 1)));

//        var_dump($xml_array);
        foreach ($xml_array['проект'] as $project) {
//            print_r($project);
            $projectAR = new Project();
            $projectAR->importXML($project);
        }
    }
}
