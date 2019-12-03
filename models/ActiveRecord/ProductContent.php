<?php

namespace app\models\ActiveRecord;

use app\models\ActiveRecord\Queries\ProductContentQuery;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "PRODUCT_CONTENT".
 *
 * @property int $ID
 * @property int $PRODUCT_ID ID продукта
 * @property int $INGREDIENT_ID ID ингридиента
 * @property float $COUNT количество
 *
 * @property IngredientsList $ingredient
 * @property Product $product
 */
class ProductContent extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'PRODUCT_CONTENT';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PRODUCT_ID', 'INGREDIENT_ID', 'COUNT'], 'required'],
            [['PRODUCT_ID', 'INGREDIENT_ID'], 'integer'],
            [['COUNT'], 'number'],
            [
                ['INGREDIENT_ID'],
                'exist',
                'skipOnError' => true,
                'targetClass' => IngredientsList::className(),
                'targetAttribute' => ['INGREDIENT_ID' => 'ID']
            ],
            [
                ['PRODUCT_ID'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Product::className(),
                'targetAttribute' => ['PRODUCT_ID' => 'ID']
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
            'PRODUCT_ID' => 'Имя продукта',
            'INGREDIENT_ID' => 'Имя ингридиента',
            'COUNT' => 'Количество',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getIngredient()
    {
        return $this->hasOne(IngredientsList::className(), ['ID' => 'INGREDIENT_ID']);
    }

    /**
     * @return ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['ID' => 'PRODUCT_ID']);
    }

    /**
     * {@inheritdoc}
     * @return ProductContentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductContentQuery(get_called_class());
    }
}
