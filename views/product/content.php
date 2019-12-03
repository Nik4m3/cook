<?php

use app\models\ActiveRecord\Product;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductContentForm */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model Product */

$this->title = $model->NAME;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(
            'Добавить',
            ['/product-content/create', 'PRODUCT_ID' => $model->ID],
            ['class' => 'btn btn-primary']
        ) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
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
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a(
                            '', ['/product-content/update', 'id' => $model->ID],
                            ['class' => 'glyphicon glyphicon-pencil', 'target' => '_blank']
                        );
                    },
                    'delete' => function ($url, $model) {
                        return Html::a(
                            '', ['/product-content/delete', 'id' => $model->ID],
                            [
                                'class' => 'glyphicon glyphicon-trash',
                                'data' => [
                                    'confirm' => 'Процесс необратим',
                                    'method' => 'post',
                                ]
                            ]
                        );
                    },
                ]
            ],
        ],
    ]); ?>

</div>
