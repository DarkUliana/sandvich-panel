<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Phone;


/**
 * PhoneSearch represents the model behind the search form about `common\models\Phone`.
 */
class PhoneSearch extends Phone
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'active', 'position'], 'integer'],
            [['name', 'phone'], 'safe'],
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
        return self::find()
                ->active()
                ->defaultOrder()
                ->asArray()->all();
    }

}
