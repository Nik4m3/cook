<?php

namespace app\models\ActiveRecord\Queries;

use app\models\ActiveRecord\Users;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\app\models\ActiveRecord\Users]].
 *
 * @see \app\models\ActiveRecord\Users
 */
class UsersQuery extends ActiveQuery
{
    /**
     * {@inheritdoc}
     * @return Users[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Users|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
