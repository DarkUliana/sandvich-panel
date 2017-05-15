<?php

namespace common\models\query;

use \common\models\Feedback;

/**
 * This is the ActiveQuery class for [[\common\models\Feedback]].
 *
 * @see \common\models\Feedback
 */
class FeedbackQuery extends \yii\db\ActiveQuery
{
    public function defaultOrder()
    {
        return $this->orderBy([Feedback::tableName() . '.datetime' => SORT_DESC]);
    }
    
    public function notCheck()
    {
        return $this->andWhere([Feedback::tableName() . '.check' => false]);
    }

    /**
     * @inheritdoc
     * @return \common\models\Feedback[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Feedback|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
