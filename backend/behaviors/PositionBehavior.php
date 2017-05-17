<?php

namespace backend\behaviors;

use yii\base\Behavior;
use yii\db\ActiveRecord;

/**
 * Class PositionBehavior
 * @package backend\behaviors
 */
class PositionBehavior extends Behavior
{
    /**
     * @var ActiveRecord
     */
    public $owner;
    /**
     * Position attribute
     * @var string
     */
    public $positionAttr = 'position';
    /**
     * Value attribute
     * @var string
     */
    public $valueAttr = 'id';

    /**
     * @inheritdoc
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'position',
        ];
    }

    public function position()
    {
        $this->owner->{$this->positionAttr} = $this->owner->{$this->valueAttr};
        $this->owner->updateAttributes([$this->positionAttr]);
    }
}

