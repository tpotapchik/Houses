<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "collection".
 *
 * @property integer $id
 * @property string $value
 *
 * @property Project[] $projects
 */
class Collection extends GeneralHelper
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'collection';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value'], 'required'],
            [['value'], 'string', 'max' => 255],
            [['value'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'value' => Yii::t('yii', 'Value'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['collection_id' => 'id']);
    }
}
