<?php

use yii\db\Schema;
use yii\db\Migration;

class m150117_204415_articles extends Migration
{
    const TABLE_ARTICLE = 'article';
    const TABLE_ARTICLE_CATEGORY = 'article_category';

    public function safeUp()
    {
        $this->createTable(self::TABLE_ARTICLE_CATEGORY, [
            'id' => Schema::TYPE_PK,
            'parent_id' => Schema::TYPE_INTEGER . ' DEFAULT NULL',
            'title' => Schema::TYPE_STRING . ' NOT NULL'
        ]);

        $this->addForeignKey('FK_parent_category', self::TABLE_ARTICLE_CATEGORY, 'parent_id', self::TABLE_ARTICLE_CATEGORY, 'id', 'CASCADE', 'CASCADE');

        $this->createTable(self::TABLE_ARTICLE, [
            'id' => Schema::TYPE_PK,
            'url_key' => Schema::TYPE_STRING,
            'author_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'category_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'is_published' => Schema::TYPE_BOOLEAN . ' NOT NULL DEFAULT FALSE',
            'intro_text' => Schema::TYPE_TEXT,
            'full_text' => Schema::TYPE_TEXT . ' NOT NULL',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'meta_keywords' => Schema::TYPE_TEXT,
            'meta_description' => Schema::TYPE_TEXT
        ]);

        $this->createIndex('article_url_uniq', self::TABLE_ARTICLE, 'url_key', true);
        $this->addForeignKey('FK_article_author', self::TABLE_ARTICLE, 'author_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_article_category', self::TABLE_ARTICLE, 'category_id', self::TABLE_ARTICLE_CATEGORY, 'id', 'CASCADE', 'CASCADE');

    }

    public function safeDown()
    {
        $this->dropForeignKey('FK_article_category', self::TABLE_ARTICLE);
        $this->dropForeignKey('FK_article_author', self::TABLE_ARTICLE);
        $this->dropIndex('article_url_uniq', self::TABLE_ARTICLE);
        $this->dropTable(self::TABLE_ARTICLE);

        $this->dropForeignKey('FK_parent_category', self::TABLE_ARTICLE_CATEGORY);
        $this->dropTable(self::TABLE_ARTICLE_CATEGORY);
    }
}
