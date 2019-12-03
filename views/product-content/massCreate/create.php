<?php
$this->title = $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Итоговый продукт', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

use app\assets\ProductContentAsset;
use app\models\ActiveRecord\ProductContent;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

ProductContentAsset::register($this);
?>

<div class="product-create">

    <div class="product-content-form">
        <?php $form = ActiveForm::begin(); ?>
        <h1>Массовое добавление в <?= Html::encode($this->title) ?></h1>
        <div class="help text-center">1 грамм = 0.001; 10 грамм = 0,01; 100 грамм = 0,1; 1 кг 200 грамм = 1,2;</div>
        <div class="row">
            <div class="col-md-11 text-center">
                <?= Html::label('Итоговый вес\штук продукта', 'mass-weight') ?>
                <?= Html::textInput('mass-weight', '',
                    ['type' => 'number', 'step' => '0.001', 'class' => 'mass-weight']) ?>
            </div>
            <div class="col-md-1 text-right">
                <?= Html::button('', ['class' => 'btn-success fa fa-plus add-tr', 'data-id' => $model->ID]) ?>
            </div>
        </div>
        <div class="row main-row">
            <?= $this->render('_tr', [
                'model' => $model,
                'form' => $form,
                'productContentModel' => new ProductContent(),
                'ingredients' => $ingredients,
            ]) ?>
            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>