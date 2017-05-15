<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[RefrigerationEquipment]].
 *
 * @see RefrigerationEquipment
 */
class RefrigerationEquipmentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return RefrigerationEquipment[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return RefrigerationEquipment|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
