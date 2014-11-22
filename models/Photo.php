<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "photo".
 *
 * @property integer $id
 * @property string $title
 * @property string $file
 * @property integer $project_id
 *
 * @property Project $project
 */
class Photo extends PhotoGeneral
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photo';
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

    public static function import($items, $project_id)
    {
        foreach ($items['фото'] as $item) {
            $model = new static();
            $model->project_id = $project_id;
            $model->title = $item['@attributes']['название'];
            $model->file = $item['@attributes']['файл'];
            $model->save();
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }
}
