<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Project;
use yii\db\Connection;
use yii\db\Expression;

/**
 * ProjectSearch represents the model behind the search form about `app\models\Project`.
 */
class ProjectSearch extends Project
{
    public static $queryRandom = null;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'roof_id', 'type_id', 'typeView_id', 'category_id', 'collection_id', 'carPlaces'], 'integer'],
            [['numCat', 'title', 'technology'], 'safe'],
            [['ready', 'new', 'southEnter', 'energySaving'], 'boolean'],
            [['cubage', 'effectiveArea'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Project::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'ready' => $this->ready,
            'new' => $this->new,
            'southEnter' => $this->southEnter,
            'roof_id' => $this->roof_id,
            'energySaving' => $this->energySaving,
            'type_id' => $this->type_id,
            'typeView_id' => $this->typeView_id,
            'category_id' => $this->category_id,
            'collection_id' => $this->collection_id,
            'carPlaces' => $this->carPlaces,
            'cubage' => $this->cubage,
            'effectiveArea' => $this->effectiveArea,
        ]);

        $query->andFilterWhere(['like', 'numCat', $this->numCat])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'technology', $this->technology]);

        return $dataProvider;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param FilterPanel $model
     *
     * @return ActiveDataProvider
     */
    public function searchFilter(FilterPanel $model)
    {
        $query = $this->prepareQuery($model);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $dataProvider;
    }

    /**
     * @param FilterPanel $model
     * @return \yii\db\ActiveQuery
     */
    public function prepareQuery(FilterPanel $model)
    {
        $query = Project::find();

        $query->andFilterWhere(['category_id' => $model->categoryId])
            ->andFilterWhere(['like', new Expression('lower(title)'), explode(' ', $model->projectTitle)]);

        if ($model->isGarage) {
            $query->andFilterWhere(['>', 'carPlaces', intval($model->isGarage)]);
        }

        if ($model->effectiveAreaFrom > 0 && $model->effectiveAreaTo > 0) {
            $query->andFilterWhere(['between', 'effectiveArea', $model->effectiveAreaFrom, $model->effectiveAreaTo]);
            return $query;
        } elseif ($model->effectiveAreaFrom > 0) {
            $query->andFilterWhere(['>=', 'effectiveArea', $model->effectiveAreaFrom]);
            return $query;
        } elseif ($model->effectiveAreaTo > 0) {
            $query->andFilterWhere(['<=', 'effectiveArea', $model->effectiveAreaTo]);
            return $query;
        }
        return $query;
    }

    /**
     * @param FilterPanel $model
     * @return Project
     * @throws \Exception
     */
    public function searchOneRandomByFilter(FilterPanel $model)
    {
        static::$queryRandom = $this->prepareQuery($model);

        $project = Yii::$app->getDb()->cache(function (Connection $db) {
            return ProjectSearch::$queryRandom->orderBy(new Expression('RAND()'))->limit(1)->one();
        }, 60 * 5);

        return $project;

    }
}
