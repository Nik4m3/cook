<?php

namespace app\models\ActiveRecord;

use app\models\ActiveRecord\Queries\UserTypesQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "USER_TYPES".
 *
 * @property int $ID
 * @property string $TYPE тип пользователя
 *
 * @property Users[] $users
 */
class UserTypes extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'USER_TYPES';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TYPE'], 'required'],
            [['TYPE'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'TYPE' => 'тип пользователя',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['TYPE_ID' => 'ID']);
    }

    /**
     * {@inheritdoc}
     * @return UserTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserTypesQuery(get_called_class());
    }
}
