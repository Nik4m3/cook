<?php

namespace app\models\ActiveRecord;

use app\models\ActiveRecord\Queries\UnitTypesQuery;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "UNIT_TYPES".
 *
 * @property int $ID
 * @property string $NAME Имя единицы измерения
 *
 * @property IngredientsList[] $ingredientsLists
 */
class UnitTypes extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'UNIT_TYPES';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NAME'], 'required'],
            [['NAME'], 'string', 'max' => 255],
            [['NAME'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'NAME' => 'Имя единицы измерения',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getIngredientsLists()
    {
        return $this->hasMany(IngredientsList::className(), ['UNIT_ID' => 'ID']);
    }

    /**
     * {@inheritdoc}
     * @return UnitTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UnitTypesQuery(get_called_class());
    }
}
