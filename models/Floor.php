<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "floor".
 *
 * @property integer $id
 * @property string $title
 * @property string $file
 * @property integer $project_id
 *
 * @property Project $project
 */
class Floor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'floor';
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
        foreach ($items as $item) {
            if (isset($item['этаж'])) {
                $item = $item['этаж']['@attributes'];

            } else {
                $item = $item['@attributes'];
            }

            $model = new static();
            $model->project_id = $project_id;
            $model->title = $item['название'];
            $model->file = $item['чертеж'];
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

    public function behaviors()
    {
        return [
            'Photo' => [
                'class' => 'app\library\PhotoBehavior'
            ]
        ];
    }
}
