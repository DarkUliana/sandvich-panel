<?php

namespace backend\behaviors;

use yii\base\Behavior;
use yii\db\ActiveRecord;
use ReflectionClass;
use Yii;

/**
 * Class TranslationSaveBehavior
 * @package backend\behaviors
 */
class TranslationSaveBehavior extends Behavior
{
    /**
     * @var ActiveRecord
     */
    public $owner;
    /**
     * @var string
     */
    public $translationClassName;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->translationClassName = (new ReflectionClass($this->translationClassName))->getShortName();
    }

    /**
     * @inheritdoc
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'translation',
        ];
    }

    public function translation()
    {
        foreach (Yii::$app->request->post($this->translationClassName, []) as $language => $data) {
            foreach ($data as $attribute => $translation) {
                $this->owner->translate($language)->$attribute = $translation;
            }
        }
    }
}