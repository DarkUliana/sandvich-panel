<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[PanelProject]].
 *
 * @see PanelProject
 */
class PanelProjectQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

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
