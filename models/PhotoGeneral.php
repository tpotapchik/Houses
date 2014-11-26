<?php
/**
 * Houses
 * User: coxa
 * Date: 20.11.14
 * Time: 20:06
 */

namespace app\models;


use yii\db\ActiveRecord;

class PhotoGeneral extends ActiveRecord
{

    public function behaviors()
    {
        return [
            'Photo' => [
                'class' => 'app\library\PhotoBehavior'
            ]
        ];
    }
}
