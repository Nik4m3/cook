<?php

namespace app\models\ActiveRecord;

use Yii;

/**
 * This is the model class for table "NOTES".
 *
 * @property int $ID
 * @property string $DATE
 * @property string $VALUE Текст
 * @property int|null $PRODUCT_ID ссылка на продукт
 *
 * @property Product $product
 */
class Notes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'NOTES';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DATE'], 'safe'],
            [['VALUE'], 'required'],
            [['PRODUCT_ID'], 'integer'],
            [['VALUE'], 'string', 'max' => 255],
            [['PRODUCT_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['PRODUCT_ID' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'DATE' => 'Дата создания',
            'VALUE' => 'Текст',
            'PRODUCT_ID' => 'Продукт',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['ID' => 'PRODUCT_ID']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\ActiveRecord\Queries\NotesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ActiveRecord\Queries\NotesQuery(get_called_class());
    }
}
