<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RefrigerationEquipment;
use creocoder\translateable\TranslateableBehavior;


/**
 * RefrigerationEquipmentSearch represents the model behind the search form about `common\models\RefrigerationEquipment`.
 */
class RefrigerationEquipmentSearch extends RefrigerationEquipment
{
    public function behaviors()
    {
        return [
            'translateable' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['title', 'body'],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public static function getAll()
    {
        return self::find()->joinWith(['translationDefault'])
                ->andWhere('active = 1')
                ->orderBy(['position' => 'SORT_ASC'])
                ->asArray()->all();
    }
}
