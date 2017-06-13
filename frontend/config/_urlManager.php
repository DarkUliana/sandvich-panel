<?php
return [
    'class' => 'pheme\i18n\I18nUrlManager',
    'languages' => ['ua', 'ru'],
    'aliases' => ['ua' => 'uk-UA', 'ru' => 'ru-RU'],
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'enableStrictParsing' => true,
    'rules'=> [
        '/' => 'site/index',
        '/set-locale' => 'site/set-locale',
        '/glide' => 'site/glide',
        'send' => 'site/send',
        'result' => 'site/result',
    ]
];
