<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WidgetText;
use creocoder\translateable\TranslateableBehavior;

/**
 * WidgetTextSearch represents the model behind the search form about `common\models\WidgetText`.
 */
class WidgetTextSearch extends WidgetText
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
                ->active()
                ->asArray()->all();
    }
}
