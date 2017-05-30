<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Checkerboard]].
 *
 * @see Checkerboard
 */
class CheckerboardQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Checkerboard[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Checkerboard|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    public function defaultOrder()
    {
        return $this->orderBy([Checkerboard::tableName() . '.position' => SORT_ASC]);
    }
}
