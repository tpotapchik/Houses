<?php

namespace app\models;

use Yii;

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
 *
 * @property Photo[] $photos
 * @property Roof $roof
 * @property Type $type
 * @property TypeView $typeView
 * @property Category $category
 * @property Collection $collection
 * @property Facade[] $facades
 * @property Floor[] $floors
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
            [['roof_id', 'type_id', 'typeView_id', 'category_id', 'collection_id', 'carPlaces'], 'integer'],
            [['cubage'], 'number'],
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
            'numCat' => Yii::t('yii', 'Num Cat'),
            'title' => Yii::t('yii', 'Title'),
            'technology' => Yii::t('yii', 'Technology'),
            'ready' => Yii::t('yii', 'Ready'),
            'new' => Yii::t('yii', 'New'),
            'southEnter' => Yii::t('yii', 'South Enter'),
            'roof_id' => Yii::t('yii', 'Roof ID'),
            'energySaving' => Yii::t('yii', 'Energy Saving'),
            'type_id' => Yii::t('yii', 'Type ID'),
            'typeView_id' => Yii::t('yii', 'Type View ID'),
            'category_id' => Yii::t('yii', 'Category ID'),
            'collection_id' => Yii::t('yii', 'Collection ID'),
            'carPlaces' => Yii::t('yii', 'Car Places'),
            'cubage' => Yii::t('yii', 'Cubage'),
        ];
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
        if ($this->save()) {

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
}
