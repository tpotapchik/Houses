<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $url_key
 * @property integer $author_id
 * @property integer $category_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $is_published
 * @property string $intro_text
 * @property string $full_text
 * @property string $title
 * @property string $meta_keywords
 * @property string $meta_description
 *
 * @property ArticleCategory $category
 * @property User $author
 */
class Article extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @param string $urlKey
     * @param int $categoryId
     * @param bool $published
     * @return static
     */
    public static function getArticle($urlKey, $categoryId = 1, $published = true)
    {
        return self::findOne(['url_key' => $urlKey, 'category_id' => $categoryId, 'is_published' => $published]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_id', 'category_id', 'full_text', 'title'], 'required'],
            [['author_id', 'category_id', 'is_published'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['intro_text', 'full_text', 'meta_keywords', 'meta_description'], 'string'],
            [['url_key', 'title'], 'string', 'max' => 255],
            [['url_key'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'url_key' => Yii::t('app', 'Url Key'),
            'author_id' => Yii::t('app', 'Author ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'is_published' => Yii::t('app', 'Is Published'),
            'intro_text' => Yii::t('app', 'Intro Text'),
            'full_text' => Yii::t('app', 'Full Text'),
            'title' => Yii::t('app', 'Title'),
            'meta_keywords' => Yii::t('app', 'Meta Keywords'),
            'meta_description' => Yii::t('app', 'Meta Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ArticleCategory::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }
}
