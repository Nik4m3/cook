<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ActiveRecord\Notes;

/**
 * NotesForm represents the model behind the search form of `app\models\ActiveRecord\Notes`.
 */
class NotesForm extends Notes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'PRODUCT_ID'], 'integer'],
            [['DATE', 'VALUE'], 'safe'],
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
        $query = Notes::find();

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
            'DATE' => $this->DATE,
            'PRODUCT_ID' => $this->PRODUCT_ID,
        ]);

        $query->andFilterWhere(['like', 'VALUE', $this->VALUE]);

        return $dataProvider;
    }
}
