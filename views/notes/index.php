<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NotesForm */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заметки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать заметку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'DATE',
            'VALUE',
            [
                'attribute' => 'PRODUCT_ID',
                'value' => function ($data) {
                    return $data->product->NAME;
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
