<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductContentForm */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Содержимое продукта';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-content-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить содержимое продукта', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'PRODUCT_ID',
                'value' => function ($data) {
                    return $data->product->NAME;
                }
            ],
            [
                'attribute' => 'INGREDIENT_ID',
                'value' => function ($data) {
                    return $data->ingredient->NAME;
                }
            ],
            [
                'label' => 'Количество',
                'value' => function ($data) {
                    return "{$data->COUNT} {$data->ingredient->unitType->NAME}";
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
