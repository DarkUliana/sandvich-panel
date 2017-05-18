<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Checkerboard;
use creocoder\translateable\TranslateableBehavior;

/**
 * CheckerboardSearch represents the model behind the search form about `common\models\Checkerboard`.
 */
class CheckerboardSearch extends Checkerboard
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

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public static function getAll()
    {
        return self::find()->joinWith(['translationDefault'])
                ->andWhere('active = 1')
                ->orderBy(['position' => 'SORT_ASC'])
                ->all();
    }
}
