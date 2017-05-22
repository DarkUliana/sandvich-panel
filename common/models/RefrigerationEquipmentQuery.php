<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[RefrigerationEquipment]].
 *
 * @see RefrigerationEquipment
 */
class RefrigerationEquipmentQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere([RefrigerationEquipment::tableName() . '.active' => true]);
    }
    
    public function defaultOrder()
    {
        return $this->orderBy([RefrigerationEquipment::tableName() . '.position' => 'SORT_ASC']);
    }
    
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
