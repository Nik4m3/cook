<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IngredientsList */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список ингредиентов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingredients-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'NAME',
            [
                'attribute' => 'UNIT_ID',
                'value' => function ($data) {
                    return $data->unitType->NAME;
                }
            ],
            'PRICE',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
