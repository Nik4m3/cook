<?php

use app\assets\IngredientListAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

IngredientListAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\ActiveRecord\IngredientsList */
/* @var $form yii\widgets\ActiveForm */
/* @var array $unitList */
?>

<div class="ingredients-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'UNIT_ID')->dropDownList($unitList, ['prompt'=>' ']) ?>

    <?= Html::label('Количество в упаковке', 'cnt')?>
    <?= Html::textInput('cnt', '', ['type' => 'number', 'step' => '0.001', 'class' => 'cnt']) ?>
    <?= Html::label('Цена за упаковку', 'price')?>
    <?= Html::textInput('price', '', ['type' => 'number', 'step' => '0.01', 'class' => 'price']) ?>

    <?= $form->field($model, 'PRICE')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
