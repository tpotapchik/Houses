<?php
/**
 * Created by PhpStorm.
 * User: coxa
 * Date: 27.11.14
 * Time: 1.32
 */

namespace app\library;


use app\models\GeneralHelper;
use yii\base\Behavior;
use yii\base\ModelEvent;
use yii\db\ActiveRecord;

class CategoryBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_UPDATE => 'modifyUrl',
        ];
    }

    public function modifyUrl()
    {
        $this->owner->url = GeneralHelper::translitForUrl($this->owner->value);
    }
}
