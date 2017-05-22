<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\KeyStorageItem;


/**
 * PhoneSearch represents the model behind the search form about `common\models\Phone`.
 */
class KeyStorageItemSearch extends KeyStorageItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'value'], 'safe'],
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
                ->asArray()->all();
    }

}
