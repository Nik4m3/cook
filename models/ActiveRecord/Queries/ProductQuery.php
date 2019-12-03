<?php

namespace app\models\ActiveRecord\Queries;

use app\models\ActiveRecord\Product;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\app\models\ActiveRecord\ProductList]].
 *
 * @see \app\models\ActiveRecord\Product
 */
class ProductQuery extends ActiveQuery
{
    /**
     * {@inheritdoc}
     * @return Product[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Product|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
