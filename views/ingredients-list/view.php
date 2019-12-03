<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ActiveRecord\IngredientsList */

$this->title = $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Список ингредиентов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ingredients-list-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Удаление необратимо',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Добавить ещё', ['create', 'id' => $model->ID], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'NAME',
            [
                'attribute' => 'UNIT_ID',
                'value' => $model->unitType->NAME,
            ],
            'PRICE',
        ],
    ]) ?>

</div>
