<?php

namespace app\models\ActiveRecord\Queries;

use app\models\ActiveRecord\UnitTypes;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[UnitTypes]].
 *
 * @see UnitTypes
 */
class UnitTypesQuery extends ActiveQuery
{
    /**
     * {@inheritdoc}
     * @return UnitTypes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UnitTypes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
