<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[PanelProject]].
 *
 * @see PanelProject
 */
class PanelProjectQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere([PanelProject::tableName() . '.active' => true]);
    }
    
    public function defaultOrder()
    {
        return $this->orderBy([PanelProject::tableName() . '.position' => 'SORT_ASC']);
    }

    /**
     * @inheritdoc
     * @return PanelProject[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PanelProject|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
