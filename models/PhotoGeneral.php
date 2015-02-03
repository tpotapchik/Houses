<?php
/**
 * Houses
 * User: coxa
 * Date: 20.11.14
 * Time: 20:06
 */

namespace app\models;


use karpoff\icrop\CropImageUploadBehavior;
use yii\db\ActiveRecord;

class PhotoGeneral extends ActiveRecord
{
    public $photo_crop;
    public $photo_cropped;

    public function behaviors()
    {
        return [
            [
                'class' => 'app\library\CropPhotoBehavior',
                'attribute' => 'file',
                'scenarios' => ['insert', 'update'],
                'ratio' => 1.97,
            ],
//            [
//                'class' => 'app\library\PhotoInsertBehavior',
//            ],
        ];
    }
}
