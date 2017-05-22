<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Feedback;

/**
 * FeedbackSearch represents the model behind the search form about `common\models\Feedback`.
 */
class FeedbackSearch extends Feedback
{
    public $datetime_range;
    
    /** 
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'check'], 'integer'],
            [['name', 'phone', 'email', 'datetime_range'], 'safe'],
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
    public function search($params)
    {
        $query = Feedback::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'datetime' => SORT_DESC,
                ],
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        // Set `datetime_range` where statement
        if (!is_null($this->datetime_range)) {
            $range = $this->dateFromRange($this->datetime_range);
            if (!is_null($range[0])) {
                $query->andFilterWhere(['>=', 'datetime', date('Y-m-d', strtotime($range[0]))]);
            }
            if (!is_null($range[1])) {
                $query->andFilterWhere(['<=', 'datetime', date('Y-m-d', strtotime($range[1] . ' +1 day'))]);
            }
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'datetime' => $this->datetime,
            'check' => $this->check,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
    /**
     * Method parse date range string to array
     *
     * @param $rangeStr
     *
     * @return array
     */
    public function dateFromRange($rangeStr)
    {
        // Verify argument
        if (empty($rangeStr) || !is_string($rangeStr)) {
            return [
                0 => null,
                1 => null,
            ];
        }

        $dates = explode(' - ', $rangeStr);
        if (empty($dates[0])) {
            $dates[0] = null;
        }
        if (empty($dates[1])) {
            $dates[1] = null;
        }
        return $dates;
    }
    
}
