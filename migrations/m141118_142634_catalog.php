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
        $this->createHelperExtended('category');
        $this->createHelper('collection');
        $this->createHelperPhotos('floor');
        $this->createHelperPhotos('facade');
        $this->createHelperPhotos('photo');
        $this->createHelperType('area');
        $this->createHelperType('size');
    }

    public function safeDown()
    {
        $this->dropHelperType('size');
        $this->dropHelperType('area');
        $this->dropHelperPhotos('photo');
        $this->dropHelperPhotos('facade');
        $this->dropHelperPhotos('floor');
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
            'cubage' => 'real',
            'effectiveArea' => 'real',
            'priceUSD' => 'int DEFAULT 0'
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

    private function createHelperPhotos($tableName)
    {
        $this->createTable($tableName, [
            'id' => 'pk',
            'title' => 'string',
            'file' => 'string',
            'project_id' => 'int NOT NULL'
        ]);

        $this->addForeignKey('fk_'.$tableName.'_project', $tableName, 'project_id', 'project', 'id', 'CASCADE', 'CASCADE');
    }

    private function dropHelperPhotos($tableName)
    {
        $this->dropForeignKey('fk_'.$tableName.'_project', $tableName);
        $this->dropTable($tableName);
    }

    private function createHelperType($tableName)
    {
        $this->createTable($tableName, [
            'id' => 'pk',
            'type' => 'string',
            'value' => 'real',
            'project_id' => 'int NOT NULL'
        ]);

        $this->addForeignKey('fk_'.$tableName.'_project', $tableName, 'project_id', 'project', 'id', 'CASCADE', 'CASCADE');
    }

    private function dropHelperType($tableName)
    {
        $this->dropForeignKey('fk_'.$tableName.'_project', $tableName);
        $this->dropTable($tableName);
    }

    private function createHelperExtended($tableName)
    {
        $this->createTable($tableName, [
            'id' => 'pk',
            'value' => 'string NOT NULL',
            'processedValue' => 'string NOT NULL'
        ]);
        $this->createIndex($tableName.'_val_uniq', $tableName, 'value', true);
        $this->addForeignKey('fk_project_'.$tableName, 'project', $tableName.'_id', $tableName, 'id', 'CASCADE', 'CASCADE');
    }
}
