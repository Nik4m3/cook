<?php

namespace app\models\ActiveRecord\Queries;

use app\models\ActiveRecord\IngredientsList;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[IngredientsList]].
 *
 * @see IngredientsList
 */
class IngredientsListQuery extends ActiveQuery
{
    /**
     * {@inheritdoc}
     * @return IngredientsList[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return IngredientsList|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
