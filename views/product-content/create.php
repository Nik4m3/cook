<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ActiveRecord\ProductContent */
/* @var $products array  */
/* @var $ingredients array  */

$this->title = 'Добавить ингредиент в продукт';
$this->params['breadcrumbs'][] = ['label' => 'Ингредиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-content-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="help text-center">1 грамм = 0.001; 10 грамм = 0,01; 100 грамм = 0,1; 1 кг 200 грамм = 1,2;</div>
    <?= $this->render('_form', [
        'model' => $model,
        'products' => $products,
        'ingredients' => $ingredients,
    ]) ?>

</div>
