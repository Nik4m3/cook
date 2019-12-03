<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ActiveRecord\Product */

$this->title = $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Итоговый продукт', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Удаление будет безвозвратным',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
        ],
    ]) ?>

</div>
