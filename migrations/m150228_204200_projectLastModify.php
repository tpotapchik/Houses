<?php

use yii\db\Schema;
use yii\db\Migration;

class m150228_204200_projectLastModify extends Migration
{
    public function safeUp()
    {
        $this->addColumn('project', 'created_at', Schema::TYPE_DATETIME . ' NOT NULL');
        $this->addColumn('project', 'updated_at', Schema::TYPE_DATETIME . ' NOT NULL');
    }

    public function safeDown()
    {
        $this->dropColumn('project', 'created_at');
        $this->dropColumn('project', 'updated_at');
    }
}
