<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ActiveRecord\IngredientsList */
/* @var $unitList array */

$this->title = 'Добавить новый ингредиент';
$this->params['breadcrumbs'][] = ['label' => 'Список ингредиентов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingredients-list-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="help text-center">1 грамм = 0.001; 10 грам = 0,01; 100 грамм = 0,1; 1 кг 200 грамм = 1,2;</div>

    <?= $this->render('_form', [
        'model' => $model,
        'unitList' => $unitList,
    ]) ?>

</div>
