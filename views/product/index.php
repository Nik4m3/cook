<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductForm */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Итоговый продукт';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'NAME',
            'MARGIN',
            [
                'label' => 'Итого',
                'value' => function ($data) {
                    $sum = $data->MARGIN;
                    foreach ($data->productContents as $ingredient) {
                        $sum += $ingredient->COUNT * $ingredient->ingredient->PRICE;
                    }
                    return (float)$sum . ' рублей за кг\шт';
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}{ingredients}{add}{massCreate}',
                'buttons' => [
                    'ingredients' => function ($url, $model) {
                        return Html::a(
                            '', ['content', 'id' => $model->ID],
                            [
                                'class' => 'fa fa-list btn-link',
                                'title' => 'Ингредиенты',
                                'style' => 'margin-left:7px',
                                'target' => '_blank'
                            ]
                        );
                    },
                    'add' => function ($url, $model) {
                        return Html::a(
                            '', ['/product-content/create', 'PRODUCT_ID' => $model->ID],
                            [
                                'class' => 'fa fa-plus btn-link',
                                'title' => 'Добавить ингредиент',
                                'style' => 'margin-left:7px',
                                'target' => '_blank'
                            ]
                        );
                    },
                    'massCreate' => function ($url, $model) {
                        return Html::a(
                            '', ['/product-content/mass-create', 'id' => $model->ID],
                            [
                                'class' => 'fa fa-cart-plus btn-link',
                                'title' => 'Добавить много ингредиентов',
                                'style' => 'margin-left:7px',
                                'target' => '_blank'
                            ]
                        );
                    }
                ]
            ],
        ],
    ]); ?>


</div>
