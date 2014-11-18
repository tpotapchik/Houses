<?php

use yii\db\Schema;
use yii\db\Migration;

class m141118_142634_catalog extends Migration
{
    public function safeUp()
    {
        $this->createProject();
        $this->createHelper('roof');
        $this->createHelper('type');
        $this->createHelper('typeView');
        $this->createHelper('category');
        $this->createHelper('collection');
    }

    public function safeDown()
    {
        $this->dropHelper('collection');
        $this->dropHelper('category');
        $this->dropHelper('typeView');
        $this->dropHelper('type');
        $this->dropHelper('roof');
        $this->dropProject();
    }

    private function createProject()
    {
        $this->createTable('project', [
            'id' => 'pk',
            'numCat' => 'string NOT NULL',
            'title' => 'string NOT NULL',
            'technology' => 'text NOT NULL',
            'ready' => 'boolean',
            'new' => 'boolean',
            'southEnter' => 'boolean',
            'roof_id' => 'int NOT NULL',
            'energySaving' => 'boolean',
            'type_id' => 'int NOT NULL',
            'typeView_id' => 'int NOT NULL',
            'category_id' => 'int NOT NULL',
            'collection_id' => 'int NOT NULL',
            'carPlaces' => 'smallint',
            'cubage' => 'decimal(4,2)',
        ]);

        $this->createIndex('project_numCat', 'project', 'numCat', true);
    }

    private function dropProject()
    {
        $this->dropIndex('project_numCat', 'project');
        $this->dropTable('project');
    }

    private function createHelper($tableName)
    {
        $this->createTable($tableName, [
            'id' => 'pk',
            'value' => 'string NOT NULL'
        ]);
        $this->createIndex($tableName.'_val_uniq', $tableName, 'value', true);
        $this->addForeignKey('fk_project_'.$tableName, 'project', $tableName.'_id', $tableName, 'id', 'CASCADE', 'CASCADE');
    }

    private function dropHelper($tableName)
    {
        $this->dropForeignKey('fk_project_'.$tableName, 'project');
        $this->dropIndex($tableName.'_val_uniq', $tableName);
        $this->dropTable($tableName);
    }
}
