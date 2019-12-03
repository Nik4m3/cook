<?php


namespace app\assets;

use yii\web\AssetBundle;

class ProductContentAsset extends AssetBundle
{
    public $sourcePath = '@app/assets';
    public $js = [
        'js/ProductContent/script.js',
    ];
    public $css = [
    ];
    public $depends = [
        AppAsset::class,
    ];
}