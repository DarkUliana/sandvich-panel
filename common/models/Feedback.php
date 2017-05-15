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
    const STATUS_CHECKED = true;
    
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
            [['name', 'phone'], 'required'],
            [['datetime'], 'safe'],
            [['check'], 'boolean'],
            [['name', 'phone'], 'string', 'max' => 255],
            [['email'], 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'name' => Yii::t('common', 'Name'),
            'phone' => Yii::t('common', 'Phone'),
            'email' => Yii::t('common', 'Email'),
            'datetime' => Yii::t('common', 'Datetime'),
            'check' => Yii::t('common', 'Check'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\FeedbackQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\FeedbackQuery(get_called_class());
    }
    
    public static function statuses()
    {
        return [
            !self::STATUS_CHECKED => Yii::t('common', "Not checked"),
            self::STATUS_CHECKED => Yii::t('common', "Checked"),
        ];
    }
}
