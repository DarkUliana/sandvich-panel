<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%phone}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property integer $active
 * @property integer $position
 */
class Phone extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = true;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%phone}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active', 'position'], 'integer'],
            [['name', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('backend', 'Name'),
            'phone' => Yii::t('backend', 'Phone'),
            'active' => Yii::t('backend', 'Active'),
            'position' => Yii::t('backend', 'Position'),
        ];
    }

    /**
     * @inheritdoc
     * @return PhoneQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PhoneQuery(get_called_class());
    }
    
    public static function statuses()
    {
        return [
            !self::STATUS_ACTIVE => Yii::t('backend', "Inactive"),
            self::STATUS_ACTIVE => Yii::t('backend', "Active"),
        ];
    }
}
