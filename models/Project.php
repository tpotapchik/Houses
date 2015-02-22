<?php

namespace app\models;

use Yii;
use yii\db\Connection;
use yii\db\Expression;

/**
 * This is the model class for table "project".
 *
 * @property integer $id
 * @property string $numCat
 * @property string $title
 * @property string $technology
 * @property boolean $ready
 * @property boolean $new
 * @property boolean $southEnter
 * @property integer $roof_id
 * @property boolean $energySaving
 * @property integer $type_id
 * @property integer $typeView_id
 * @property integer $category_id
 * @property integer $collection_id
 * @property integer $carPlaces
 * @property double $cubage
 * @property double $effectiveArea
 * @property integer $priceUSD
 *
 * @property Floor[] $floors
 * @property Facade[] $facades
 * @property Photo[] $photos
 * @property Area[] $areas
 * @property Roof $roof
 * @property Type $type
 * @property TypeView $typeView
 * @property Category $category
 * @property Collection $collection
 * @property Size[] $sizes
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numCat', 'title', 'technology', 'roof_id', 'type_id', 'typeView_id', 'category_id', 'collection_id'], 'required'],
            [['technology'], 'string'],
            [['ready', 'new', 'southEnter', 'energySaving'], 'boolean'],
            [['roof_id', 'type_id', 'typeView_id', 'category_id', 'collection_id', 'carPlaces', 'priceUSD'], 'integer'],
            [['cubage', 'effectiveArea'], 'number'],
            [['numCat', 'title'], 'string', 'max' => 255],
            [['numCat'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'numCat' => Yii::t('house', 'Num Cat'),
            'title' => Yii::t('house', 'Title'),
            'technology' => Yii::t('house', 'Technology'),
            'ready' => Yii::t('house', 'Ready'),
            'new' => Yii::t('house', 'New'),
            'southEnter' => Yii::t('house', 'South Enter'),
            'roof_id' => Yii::t('house', 'Roof ID'),
            'energySaving' => Yii::t('house', 'Energy Saving'),
            'type_id' => Yii::t('house', 'Type ID'),
            'typeView_id' => Yii::t('house', 'Type View ID'),
            'category_id' => Yii::t('house', 'Category ID'),
            'collection_id' => Yii::t('house', 'Collection ID'),
            'carPlaces' => Yii::t('house', 'Car Places'),
            'cubage' => Yii::t('house', 'Cubage'),
            'effectiveArea' => Yii::t('house', 'Effective Area'),
            'priceUSD' => Yii::t('house', 'Price USD'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSizes()
    {
        return $this->hasMany(Size::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoof()
    {
        return $this->hasOne(Roof::className(), ['id' => 'roof_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypeView()
    {
        return $this->hasOne(TypeView::className(), ['id' => 'typeView_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCollection()
    {
        return $this->hasOne(Collection::className(), ['id' => 'collection_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreas()
    {
        return $this->hasMany(Area::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Photo::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacades()
    {
        return $this->hasMany(Facade::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFloors()
    {
        return $this->hasMany(Floor::className(), ['project_id' => 'id']);
    }

    public function importXML($xml)
    {
        $this->numCat = $xml['@attributes']['но-кат'];
        $this->title = $xml['название'];
        $this->technology = $xml['технология'];
        $this->ready = strpos($xml['готов'], 'да') !== false ? true : false;
        $this->new = strpos($xml['новинка'], 'да') !== false ? true : false;
        $this->southEnter = strpos($xml['СоВходомСЮга'], 'да') !== false ? true : false;
        $this->roof_id = Roof::getOrInsert($xml['ВидКровли']);
        $this->energySaving = $this->getEnergySaving($xml['энергосберегательность']);
        $this->type_id = Type::getOrInsert($xml['Тип']);
        $this->typeView_id = TypeView::getOrInsert($xml['Вид']);
        $this->category_id = Category::getOrInsert($xml['категории']);
        $this->collection_id = Collection::getOrInsert($xml['колекция']);
        $this->carPlaces = $xml['Количество_Мест_На_Машины'];
        $this->cubage = $this->getCubage($xml['кубатура']);
        $this->effectiveArea = $this->getEffectiveArea($xml['полезная']);
        if ($this->save()) {
            $this->postSaveImport($xml);
        }
    }

    /**
     * @param array $energySavingElement
     * @return bool
     */
    private function getEnergySaving(array $energySavingElement)
    {
        $val = $energySavingElement['@attributes']['Энергосберегающий'];
        return strpos($val, 'да') !== false ? true : false;
    }

    /**
     * @param array $cubage
     * @return float
     */
    private function getCubage(array $cubage)
    {
        return sprintf("%01.2f", doubleval($cubage['@attributes']['общая']));
    }

    /**
     * @param $xml
     */
    private function postSaveImport($xml)
    {
        if (isset($xml['фотографии'])) {
            //photo
            Photo::import($xml['фотографии'], $this->id);
        }
        if (isset($xml['фасады'])) {
            //facade
            Facade::import($xml['фасады'], $this->id);
        }
        if (isset($xml['этажи'])) {
            //floor
            Floor::import($xml['этажи'], $this->id);
        }
        Area::import($xml['полезная'], $this->id);
        Size::import($xml['размеры'], $this->id);
    }

    private function getEffectiveArea($effectiveArea)
    {
        return sprintf("%01.2f", doubleval($effectiveArea['@attributes']['площадь']));
    }

    /**
     * @param string $DefaultPhoto
     * @return string
     */
    public function getMainPhoto($DefaultPhoto = '/img/temp/house1.jpg')
    {
        /** @var Photo $photo */
        $photo = $this->getDb()->cache(function (Connection $db) {
            return $this->getPhotos()->where('title=:title', [':title'=>'фото'])->one();
        }, 60 * 5);
        if ($photo) {
            $DefaultPhoto = $photo->file;
        }
        return $DefaultPhoto;
    }

    public function getOtherPhotos()
    {
        $result = [];
        /** @var Photo $photo */
        $photo = $this->getDb()->cache(function (Connection $db) {
            return $this->getPhotos()->where('title!=:title', [':title'=>'фото'])->all();
        }, 60 * 5);
        if ($photo) {
            $result = $photo;
        }
        return $result;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public static function getRandom()
    {
        $project = Yii::$app->getDb()->cache(function (Connection $db) {
            return static::find()->orderBy(new Expression('RAND()'))->limit(1)->one();
        }, 60 * 5);

        return $project;
    }
}
