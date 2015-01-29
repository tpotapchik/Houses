<?php

use app\models\Project;
use yii\db\Migration;

class m150129_181815_correctionProjectTitle extends Migration
{
    /**
     *
     */
    public function safeUp()
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

    public function safeDown()
    {
        echo "m150129_181815_correctionProjectTitle cannot be reverted.\n";

        return false;
    }
}
