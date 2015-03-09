<?php

use yii\db\Schema;
use yii\db\Migration;

class m150309_155347_projectSEO extends Migration
{
    public function safeUp()
    {
        $this->addColumn('project', 'meta_keywords', Schema::TYPE_TEXT);
        $this->addColumn('project', 'meta_description', Schema::TYPE_TEXT);
    }

    public function safeDown()
    {
        $this->dropColumn('project', 'meta_keywords');
        $this->dropColumn('project', 'meta_description');
    }
}
