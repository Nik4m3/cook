<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ActiveRecord\ProductContent;

/**
 * ProductContentForm represents the model behind the search form of `app\models\ActiveRecord\ProductContent`.
 */
class ProductContentForm extends ProductContent
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'PRODUCT_ID', 'INGREDIENT_ID'], 'integer'],
            [['COUNT'], 'number'],
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
        $query = ProductContent::find();

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
            'PRODUCT_ID' => $this->PRODUCT_ID,
            'INGREDIENT_ID' => $this->INGREDIENT_ID,
            'COUNT' => $this->COUNT,
        ])->orderBy('PRODUCT_ID');

        return $dataProvider;
    }

    public function massSave($data)
    {
        foreach ($data as $value) {
            $model = new ProductContent();
            $model->load($value, '');
            $model->save();
        }
    }
}
