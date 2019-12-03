<?php


namespace app\assets;

use yii\web\AssetBundle;

class IngredientListAsset extends AssetBundle
{
    public $sourcePath = '@app/assets';
    public $js = [
        'js/IngredientsList/script.js',
    ];
    public $css = [
    ];
    public $depends = [
        AppAsset::class,
    ];
}