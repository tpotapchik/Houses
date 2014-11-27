<?php
/**
 * Houses
 * User: coxa
 * Date: 19.11.14
 * Time: 1:20
 */

namespace app\models;


use Yii;
use yii\base\Model;

class FilterPanel extends Model
{
    public $effectiveAreaFrom;
    public $effectiveAreaTo;
    public $isGarage;
    public $hasGroundFloor;
    public $categoryId;
    public $projectTitle;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['effectiveAreaFrom', 'effectiveAreaTo', 'categoryId'], 'integer'],
            [['isGarage', 'hasGroundFloor'], 'required'],
//            ['effectiveAreaFrom', 'compare', 'operator' => '<=', 'compareAttribute' => 'effectiveAreaTo'],
            ['projectTitle', 'string', 'length' => [0, 255]],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'effectiveAreaFrom' => Yii::t('house', 'Effective area'),
            'effectiveAreaTo' => Yii::t('house', 'Effective area'),
            'isGarage' => Yii::t('house', 'Garage'),
            'hasGroundFloor' => Yii::t('house', 'Ground floor'),
            'categoryId' => Yii::t('house', 'Project category'),
            'projectTitle' => Yii::t('house', 'Project title'),
        ];
    }
}
