<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ActiveRecord\ProductContent */
/* @var $products array  */
/* @var $ingredients array  */

$this->title = 'Обновить ингредиент: ' . $model->ingredient->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Ингредиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ingredient->NAME, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="product-content-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'products' => $products,
        'ingredients' => $ingredients,
    ]) ?>

</div>
