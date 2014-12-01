<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Connection;
use yii\db\Expression;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $value
 * @property string $processedValue
 * @property string $url
 *
 * @property Project[] $projects
 */
class Category extends GeneralHelper
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    public function behaviors()
    {
        return [
            'Category' => [
                'class' => 'app\library\CategoryBehavior'
            ]
        ];
    }

    private static function processValue($value)
    {
        $value = str_replace('_', ' ', $value);
        return ucfirst($value);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value', 'processedValue', 'url'], 'required'],
            [['value', 'processedValue'], 'string', 'max' => 255],
            [['value', 'url'], 'unique']
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
            'processedValue' => Yii::t('yii', 'Processed Value'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['category_id' => 'id']);
    }

    /**
     * @param $value
     * @return int|null
     */
    public static function getOrInsert($value)
    {
        $result = null;
        $model = static::findOne(['value' => $value]);
        if ($model) {
            $result = $model->id;
        } else {
            $model = new static();
            $model->value = $value;
            $model->processedValue = static::processValue($value);
            $model->url = GeneralHelper::translitForUrl($model->value);
            if ($model->save()) {
                $result = $model->id;
            } else {
                throw new \Exception('cant save Categoty');
            }
        }
        return $result;
    }

    public function getRandomProject()
    {
        $project = $this->getDb()->cache(function (Connection $db) {
            return $this->getProjects()->orderBy(new Expression('RAND()'))->limit(1)->one();
        }, 60 * 5);

        return $project;
    }
}
