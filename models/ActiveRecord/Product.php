<?php

namespace app\models\ActiveRecord;

use app\models\ActiveRecord\Queries\ProductQuery;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "PRODUCT".
 *
 * @property int $ID
 * @property string $NAME наименование
 * @property integer $MARGIN наименование
 *
 * @property ProductContent[] $productContents
 */
class Product extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'PRODUCT';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NAME'], 'required'],
            [['NAME'], 'string', 'max' => 255],
            [['MARGIN'], 'number']
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
            'MARGIN' => 'Надбавка',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getProductContents()
    {
        return $this->hasMany(ProductContent::className(), ['PRODUCT_ID' => 'ID']);
    }

    /**
     * {@inheritdoc}
     * @return ProductQuery
     */
    public static function find()
    {
        return new ProductQuery(get_called_class());
    }
}
