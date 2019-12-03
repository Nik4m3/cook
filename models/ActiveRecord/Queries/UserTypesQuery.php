<?php

namespace app\models\ActiveRecord\Queries;

use app\models\ActiveRecord\UserTypes;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[UserTypes]].
 *
 * @see UserTypes
 */
class UserTypesQuery extends ActiveQuery
{
    /**
     * {@inheritdoc}
     * @return UserTypes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserTypes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
