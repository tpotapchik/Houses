<?php
/**
 * Houses
 * User: coxa
 * Date: 18.11.14
 * Time: 21:15
 */

namespace app\models;


class GeneralHelper extends \yii\db\ActiveRecord
{

    /**
     * @param $value
     * @return int|null
     */
    public static function getOrInsert($value)
    {
        $result = null;
        $model = static::findOne(['value' => $value]);
        if ($model) {
            $result = $model->id;
        } else {
            $model = new static();
            $model->value = $value;
            if ($model->save()) {
                $result = $model->id;
            }
        }
        return $result;
    }
}
