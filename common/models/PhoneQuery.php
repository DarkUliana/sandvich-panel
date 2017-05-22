<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Phone]].
 *
 * @see Phone
 */
class PhoneQuery extends \yii\db\ActiveQuery
{
   public function active()
    {
        return $this->andWhere([Phone::tableName() . '.active' => true]);
    }
    
    public function defaultOrder()
    {
        return $this->orderBy([Phone::tableName() . '.position' => 'SORT_ASC']);
    }
    
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Phone|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
