<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ActiveRecord\IngredientsList as IngredientsListModel;

/**
 * IngredientsList represents the model behind the search form of `app\models\ActiveRecord\IngredientsList`.
 */
class IngredientsList extends IngredientsListModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'UNIT_ID', 'PRICE'], 'integer'],
            [['NAME'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = IngredientsListModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'UNIT_ID' => $this->UNIT_ID,
            'PRICE' => $this->PRICE,
        ]);

        $query->andFilterWhere(['like', 'NAME', $this->NAME]);

        return $dataProvider;
    }
}
