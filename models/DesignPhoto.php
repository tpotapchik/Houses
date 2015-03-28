<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "design_photo".
 *
 * @property integer $id
 * @property string $file
 * @property integer $design_id
 *
 * @property Design $design
 */
class DesignPhoto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'design_photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['design_id'], 'required'],
            [['design_id'], 'integer'],
            [['file'], 'file', 'extensions' => 'jpeg, gif, png', 'on' => ['insert', 'update']]
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => 'app\library\PhotoBehavior'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'file' => Yii::t('app', 'File'),
            'design_id' => Yii::t('app', 'Design ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesign()
    {
        return $this->hasOne(Design::className(), ['id' => 'design_id']);
    }
}
