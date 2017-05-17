<?php
return [
    'class' => 'yii\web\UrlManager',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'enableStrictParsing' => true,
    'rules'=> [
        '/' => 'site/index',
        '/set-locale' => 'site/set-locale',
        'send' => 'site/send',
        'result' => 'site/result',
    ]
];
