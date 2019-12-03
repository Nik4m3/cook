<?php

namespace app\models\ActiveRecord\Queries;

/**
 * This is the ActiveQuery class for [[\app\models\ActiveRecord\Notes]].
 *
 * @see \app\models\ActiveRecord\Notes
 */
class NotesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\ActiveRecord\Notes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\ActiveRecord\Notes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
