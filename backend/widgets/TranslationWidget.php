<?php

namespace backend\widgets;

use yii\base\Model;
use yii\base\Widget;
use Yii;

/**
 * Class TranslationWidget
 * @package backend\widgets
 */
class TranslationWidget extends Widget
{
    /**
     * @var \yii\widgets\ActiveForm
     */
    public $activeForm;
    /**
     * @var Model
     */
    public $modelObj;
    /**
     * Translation class namespace
     * @var string
     */
    public $translationClass;
    /**
     * Form lang partial view
     * @var string
     */
    public $view;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        // Init tab items
        $items = [];
        foreach (Yii::$app->params['availableLocales'] as $key => $value) {

            $modelLang = $this->modelObj->hasTranslation($key);

            $items[] = [
                'label' => $value,
                'content' => Yii::$app->view->render($this->view, [
                    'form' => $this->activeForm,
                    'model' => $modelLang ? $this->modelObj->translate($key) : Yii::createObject($this->translationClass),
                    'lang' => $key,
                    'langName' => $value,
                ]),
                'active' => $key === Yii::$app->params['defaultLocale'],
            ];
        }

        return $this->render('lang/_lang_view', [
            'items' => $items,
        ]);
    }
}