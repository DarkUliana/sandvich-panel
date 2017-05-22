<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * JquerydAsset
 */
class JqueryAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/jquery/dist';

    /**
     * @var array
     */
    public $css = [];

    /**
     * @var array
     */
    public $js = [
        YII_ENV_DEV ? 'jquery.js' : 'jquery.min.js',
    ];

    /**
     * @var array
     */
    public $depends = [];
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }
}
