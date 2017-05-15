<?php
return [
    'class' => 'yii\web\UrlManager',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'enableStrictParsing' => true,
    'rules'=> [
        '/' => 'site/index',
        'send' => 'site/send',
    ]
];
