<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PanelProject;
use creocoder\translateable\TranslateableBehavior;

/**
 * PanelProjectSearch represents the model behind the search form about `common\models\PanelProject`.
 */
class PanelProjectSearch extends PanelProject
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
