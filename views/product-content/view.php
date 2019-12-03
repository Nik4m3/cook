<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ActiveRecord\ProductContent */

$this->title = $model->product->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Ингредиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-content-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Процесс необратим',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'PRODUCT_ID',
                'value' => $model->product->NAME,
            ],
            [
                'attribute' => 'INGREDIENT_ID',
                'value' => $model->ingredient->NAME,
            ],
            [
                'attribute' => 'COUNT',
                'value' => "{$model->COUNT} {$model->ingredient->unitType->NAME}",
            ],
        ],
    ]) ?>

</div>
