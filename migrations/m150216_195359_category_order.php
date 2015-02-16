<?php

use yii\db\Schema;
use yii\db\Migration;

class m150216_195359_category_order extends Migration
{
    public function safeUp()
    {
        $this->addColumn('category', 'sortOrder', Schema::TYPE_INTEGER.' unsigned NOT NULL');

        $categories = \app\models\Category::find()->all();
        /** @var \app\models\Category $category */
        foreach ($categories as $category) {
            $category->sortOrder = $category->id;
            $category->save();
        }
    }

    public function safeDown()
    {
        $this->dropColumn('category', 'sortOrder');
    }
}
