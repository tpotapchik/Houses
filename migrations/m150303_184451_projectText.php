<?php

use yii\db\Schema;
use yii\db\Migration;

class m150303_184451_projectText extends Migration
{
    public function safeUp()
    {
        $this->update('project', ['updated_at' => date('Y-m-d', strtotime('2015-02-28'))], ['updated_at' => '0000-00-00']);

        $this->addColumn('project', 'advice', Schema::TYPE_TEXT);
    }

    public function safeDown()
    {
        $this->dropColumn('project', 'advice');
    }
}
