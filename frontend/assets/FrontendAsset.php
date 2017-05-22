<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Frontend application asset
 */
class FrontendAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $basePath = '@webroot';
    /**
     * @var string
     */
    public $baseUrl = '@web';

    /**
     * @var array
     */
    public $css = [
        'css/main.min.css',
        'https://fonts.googleapis.com/css?family=Roboto:400,700&amp;amp;subset=cyrillic',
    ];

    /**
     * @var array
     */
    public $js = [
        'js/main.min.js',
        'js/own.box.min.js',
        'js/wow.min.js',
        'js/index.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        '\\frontend\\assets\\JqueryAsset',
    ];
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        // resetting BootstrapAsset to not load own css files
        \Yii::$app->assetManager->bundles['yii\\bootstrap\\BootstrapAsset'] = [
            'css' => [],
            'js' => [],
        ];
    }
}
