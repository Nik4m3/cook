<?php

use app\models\ActiveRecord\Product;
use kartik\select2\Select2;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $productContentModel app\models\ActiveRecord\ProductContent */
/* @var $model Product */
/* @var $form yii\widgets\ActiveForm */
/* @var $ingredients array */
$index = uniqid();
?>
<hr>
<div class="content-tr">
    <?= $form->field($productContentModel, "[$index]PRODUCT_ID")->hiddenInput(['value' => $model->ID])->label('') ?>
    <div class="text-center">
        <?= Html::label('Итого потрачено ингредиента', 'cnt') ?>
        <?= Html::textInput('mass-cnt', '', [
            'type' => 'number',
            'step' => '0.001',
            'class' => 'mass-cnt',
            'data-id' => $index
        ]) ?>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($productContentModel, "[$index]INGREDIENT_ID")->widget(Select2::classname(), [
                'data' => $ingredients,
                'language' => 'ru',
                'options' => ['placeholder' => ' '],
                'pluginOptions' => [
                    'allowClear' => true
                ]
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($productContentModel, "[$index]COUNT")
                ->textInput(['type' => 'number', 'step' => '0.001'])
                ->label('Итоговое количество ингредиента в киллограммах\штуках за килограмм\штуку') ?>
        </div>
    </div>
</div>
