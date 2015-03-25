<?php

use yii\db\Schema;
use yii\db\Migration;

class m150321_192134_designs extends Migration
{
    const DESIGN = 'design';
    const PHOTO = 'design_photo';

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->createTable(self::DESIGN, [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'meta_keywords' => Schema::TYPE_TEXT . ' NOT NULL',
            'meta_description' => Schema::TYPE_TEXT . ' NOT NULL',
            'text' => Schema::TYPE_TEXT . ' NOT NULL',
            'project_id' => Schema::TYPE_INTEGER . ' NOT NULL'
        ]);

        $this->createIndex('uniq_design_to_project', self::DESIGN, 'project_id', true);

        $this->addForeignKey('fk_design_project', self::DESIGN, 'project_id', 'project', 'id', 'CASCADE', 'CASCADE');

        $this->createTable(self::PHOTO, [
            'id' => Schema::TYPE_PK,
            'file' => Schema::TYPE_STRING,
            'design_id' => Schema::TYPE_INTEGER . ' NOT NULL'
        ]);

        $this->addForeignKey('fk_photo_design', self::PHOTO, 'design_id', self::DESIGN, 'id', 'CASCADE', 'CASCADE');
    }
    
    public function safeDown()
    {
        $this->dropForeignKey('fk_photo_design', self::PHOTO);
        $this->dropTable(self::PHOTO);
        $this->dropForeignKey('fk_design_project', self::DESIGN);
        $this->dropIndex('uniq_design_to_project', self::DESIGN);
        $this->dropTable(self::DESIGN);
    }
}
