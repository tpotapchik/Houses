<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "facade".
 *
 * @property integer $id
 * @property string $title
 * @property string $file
 * @property integer $project_id
 *
 * @property Project $project
 */
class Facade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'facade';
    }

    public static function import($items, $project_id)
    {
        foreach ($items['фасад'] as $item) {
            $model = new static();
            $model->project_id = $project_id;
            $model->title = $item['@attributes']['название'];
            $model->file = $item['@attributes']['фото'];
            $model->save();
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id'], 'required'],
            [['project_id'], 'integer'],
            [['title', 'file'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'title' => Yii::t('yii', 'Title'),
            'file' => Yii::t('yii', 'File'),
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

    public function behaviors()
    {
        return [
            'Photo' => [
                'class' => 'app\library\PhotoBehavior'
            ]
        ];
    }
}
