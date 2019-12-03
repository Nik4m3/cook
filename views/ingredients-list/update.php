<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ActiveRecord\IngredientsList */
/* @var $unitList array */

$this->title = 'Изменить ингредент ' . $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Список ингредиентов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="ingredients-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'unitList' => $unitList,
    ]) ?>

</div>
