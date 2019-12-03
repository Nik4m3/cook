<?php

namespace app\models\ActiveRecord;

use app\models\ActiveRecord\Queries\IngredientsListQuery;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "INGREDIENTS_LIST".
 *
 * @property int $ID
 * @property string $NAME Наименование
 * @property int $UNIT_ID ID единицы измерения fk unit_types_ID
 * @property int $PRICE цена
 *
 * @property UnitTypes $unitType
 * @property ProductContent[] $productContents
 */
class IngredientsList extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'INGREDIENTS_LIST';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NAME', 'UNIT_ID', 'PRICE'], 'required'],
            [['UNIT_ID', 'PRICE'], 'integer'],
            [['NAME'], 'string', 'max' => 255],
            [['NAME'], 'unique'],
            [
                ['UNIT_ID'],
                'exist',
                'skipOnError' => true,
                'targetClass' => UnitTypes::className(),
                'targetAttribute' => ['UNIT_ID' => 'ID']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'NAME' => 'Наименование',
            'UNIT_ID' => 'Единица измерения',
            'PRICE' => 'Цена',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getUnitType()
    {
        return $this->hasOne(UnitTypes::className(), ['ID' => 'UNIT_ID']);
    }

    /**
     * @return ActiveQuery
     */
    public function getProductContents()
    {
        return $this->hasMany(ProductContent::className(), ['INGREDIENT_ID' => 'ID']);
    }

    /**
     * {@inheritdoc}
     * @return IngredientsListQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IngredientsListQuery(get_called_class());
    }
}
