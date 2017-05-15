<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[WidgetText]].
 *
 * @see WidgetText
 */
class WidgetTextQuery extends \yii\db\ActiveQuery
{
    /**
     * @inheritdoc
     * @return WidgetText[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return WidgetText|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
