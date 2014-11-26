<?php

use app\models\GeneralHelper;
use yii\db\Schema;
use yii\db\Migration;

class m141126_204823_category_url extends Migration
{
    public function safeUp()
    {
        $table = 'category';
        $this->addColumn($table, 'url', 'string');

        $q = (new \yii\db\Query())->select(['id', 'value'])->from($table);

        $results = $q->all();
        unset($q);
        foreach ($results as $result) {
            $id = $result['id'];

            $this->update(
                $table,
                ['url' => GeneralHelper::translitForUrl($result['value'])],
                ['id' => $id]
            );
        }

        if (strpos(strtolower($this->db->getDriverName()), 'mysql') !== false) {
            $this->alterColumn($table, 'url', 'string NOT NULL');
        } else {
            $this->execute('ALTER TABLE "category" ALTER COLUMN "url" SET NOT NULL');
        }

        $this->createIndex('category_url_uniq', $table, 'url', true);
    }

    public function safeDown()
    {
        $this->dropIndex('category_url_uniq', 'category');
        $this->dropColumn('category', 'url');
    }
}
