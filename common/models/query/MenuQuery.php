<?php

namespace common\models\query;

use common\models\Menu;

/**
 * This is the ActiveQuery class for [[\common\models\Menu]].
 *
 * @see \common\models\Menu
 */
class MenuQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere([Menu::tableName() . '.active' => true]);
    }
    
    public function defaultOrder()
    {
        return $this->orderBy([Menu::tableName() . '.position' => 'SORT_ASC']);
    }

    /**
     * @inheritdoc
     * @return \common\models\Menu[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Menu|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
