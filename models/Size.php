<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "size".
 *
 * @property integer $id
 * @property string $type
 * @property double $value
 * @property integer $project_id
 *
 * @property Project $project
 */
class Size extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'size';
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
            0 => 'ширина',
            1 => 'длина',
            2 => 'высота',
            3 => 'мин-ширина-участка',
            4 => 'мин-длина-участка',
            5 => 'угол-наклона-крыши'
        ];
        foreach ($items['размер'] as $key => $value) {
            $model = new static();
            $model->project_id = $project_id;
            $model->type = $map[$key];
            $model->value = $value;
            $model->save();
        }
    }
}
