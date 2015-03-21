<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "design".
 *
 * @property integer $id
 * @property string $title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $text
 * @property integer $project_id
 *
 * @property Project $project
 * @property DesignPhoto[] $designPhotos
 */
class Design extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'design';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'meta_keywords', 'meta_description', 'text', 'project_id'], 'required'],
            [['meta_keywords', 'meta_description', 'text'], 'string'],
            [['project_id'], 'integer'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'meta_keywords' => Yii::t('app', 'Meta Keywords'),
            'meta_description' => Yii::t('app', 'Meta Description'),
            'text' => Yii::t('app', 'Text'),
            'project_id' => Yii::t('app', 'Project ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesignPhotos()
    {
        return $this->hasMany(DesignPhoto::className(), ['design_id' => 'id']);
    }
}
