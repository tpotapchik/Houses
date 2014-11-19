<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "area".
 *
 * @property integer $id
 * @property string $type
 * @property double $value
 * @property integer $project_id
 *
 * @property Project $project
 */
class Area extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'area';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value'], 'number'],
            [['project_id'], 'required'],
            [['project_id'], 'integer'],
            [['type'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'type' => Yii::t('yii', 'Type'),
            'value' => Yii::t('yii', 'Value'),
            'project_id' => Yii::t('yii', 'Project ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    public static function import($items, $project_id)
    {
        $map = [
            0 => 'общая',
            1 => 'кровли',
            2 => 'застройки'
        ];
        foreach ($items['площадь'] as $key => $value) {
            $model = new static();
            $model->project_id = $project_id;
            $model->type = $map[$key];
            $model->value = $value;
            $model->save();
        }
    }
}
