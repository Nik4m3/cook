<?php

use app\assets\ProductContentAsset;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

ProductContentAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\ActiveRecord\ProductContent */
/* @var $form yii\widgets\ActiveForm */
/* @var $products array */
/* @var $ingredients array */
?>

<div class="product-content-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PRODUCT_ID')->widget(Select2::classname(), [
        'data' => $products,
        'language' => 'ru',
        'options' => ['placeholder' => ' '],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ]) ?>
    <?= $form->field($model, 'INGREDIENT_ID')->widget(Select2::classname(), [
        'data' => $ingredients,
        'language' => 'ru',
        'options' => ['placeholder' => ' '],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ]) ?>

    <?= Html::label('Итого потрачено ингредиента', 'cnt') ?>
    <?= Html::textInput('cnt', '', ['type' => 'number', 'step' => '0.001', 'class' => 'cnt']) ?>
    <?= Html::label('Итоговый вес\штук продукта', 'weight') ?>
    <?= Html::textInput('weight', '', ['type' => 'number', 'step' => '0.001', 'class' => 'weight']) ?>

    <?= $form->field($model, 'COUNT')
        ->textInput(['type' => 'number', 'step' => '0.001'])
        ->label('Итоговое количество ингредиента в киллограммах\штуках за килограмм\штуку') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
