<?php

namespace app\models\ActiveRecord\Queries;

use app\models\ActiveRecord\ProductContent;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\app\models\ActiveRecord\ProductContent]].
 *
 * @see \app\models\ActiveRecord\ProductContent
 */
class ProductContentQuery extends ActiveQuery
{
    /**
     * {@inheritdoc}
     * @return ProductContent[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ProductContent|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
