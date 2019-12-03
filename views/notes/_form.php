<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ActiveRecord\Notes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'VALUE')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'PRODUCT_ID')->widget(Select2::classname(), [
        'data' => $products,
        'language' => 'ru',
        'options' => ['placeholder' => ' '],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
