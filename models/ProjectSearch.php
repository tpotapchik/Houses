<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Project;

/**
 * ProjectSearch represents the model behind the search form about `app\models\Project`.
 */
class ProjectSearch extends Project
{
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
        $query = Project::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $query->andFilterWhere(['category_id' => $model->categoryId])
            ->andFilterWhere(['like', 'lower(title)', $model->projectTitle])
            ->andFilterWhere(['between', 'effectiveArea', $model->effectiveAreaFrom, $model->effectiveAreaTo]);

        return $dataProvider;
    }
}
