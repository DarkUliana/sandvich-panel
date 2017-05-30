<?php

namespace backend\assets;

use yii\web\AssetBundle;

class SortableAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
    ];
    public $js = [
        'js/sortable.js'
    ];

    public $depends = [
        'yii\jui\JuiAsset'
    ];
}
