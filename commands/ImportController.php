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
use yii\helpers\Console;

class ImportController extends Controller
{
    public function actionIndex()
    {
        $this->stdout("hello import xml\n", Console::BOLD);
        $xml = simplexml_load_file(\Yii::$app->basePath . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'projekty2.xml');
        $xml_array = unserialize(serialize(json_decode(json_encode((array) $xml), 1)));

        $projects = $xml_array['проект'];
        $countProjects = count($projects);

        Console::startProgress(0, $countProjects);
        foreach ($projects as $key => $project) {
            Console::updateProgress($key, $countProjects);
            $projectAR = new Project();
            $projectAR->importXML($project);
        }
        Console::endProgress();
    }

    public function actionCorrect()
    {
        $projects = Project::find()->all();

        /** @var Project $project */
        foreach ($projects as $project) {
            $newTitle = preg_replace('/^(.+?)( \(.+\))$/i', '$1', $project->title);
            $newNumCat = preg_replace('/^(.+)(_.+)$/i', '$1', $project->numCat);

            if (!is_null($newTitle) && !is_null($newNumCat)) {
                $project->title = $newTitle;
                $project->numCat = $newNumCat;
                $project->save();
            }
        }
    }
}
