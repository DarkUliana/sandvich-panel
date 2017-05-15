<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%feedback}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $datetime
 * @property integer $check
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%feedback}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['datetime'], 'safe'],
            [['check'], 'integer'],
            [['name', 'phone', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'datetime' => Yii::t('app', 'Datetime'),
            'check' => Yii::t('app', 'Check'),
        ];
    }

    /**
     * @inheritdoc
     * @return FeedbackQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FeedbackQuery(get_called_class());
    }
}
