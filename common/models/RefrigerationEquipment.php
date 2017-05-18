<?php

namespace common\models;

use Yii;
use backend\behaviors\TranslationSaveBehavior;
use common\models\translation\RefrigerationEquipmentTranslation;
use creocoder\translateable\TranslateableBehavior;

/**
 * This is the model class for table "{{%refrigeration_equipment}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property integer $active
 * @property integer $position
 *
 * @property RefrigerationEquipmentTranslation[] $refrigerationEquipmentTranslations
 */
class RefrigerationEquipment extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = true;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'translateable' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['title'],
            ],
            [
                'class' => TranslationSaveBehavior::className(),
                'translationClassName' => RefrigerationEquipmentTranslation::className(),
            ],

        ];
    }
    
    public static function tableName()
    {
        return '{{%refrigeration_equipment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image'], 'required'],
            [['active', 'position'], 'integer'],
            [['name', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'name' => Yii::t('backend', 'Name'),
            'image' => Yii::t('backend', 'Image'),
            'active' => Yii::t('backend', 'Active'),
            'position' => Yii::t('backend', 'Position'),
        ];
    }
    
    public function getTranslations()
    {
        return $this->hasMany(RefrigerationEquipmentTranslation::className(), ['equipment_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslationDefault()
    {
        return $this->hasOne(RefrigerationEquipmentTranslation::className(), ['equipment_id' => 'id'])->andOnCondition(['language' => Yii::$app->language]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefrigerationEquipmentTranslations()
    {
        return $this->hasMany(RefrigerationEquipmentTranslation::className(), ['equipment_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return RefrigerationEquipmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RefrigerationEquipmentQuery(get_called_class());
    }
    
    public static function statuses()
    {
        return [
            !self::STATUS_ACTIVE => Yii::t('backend', "Inactive"),
            self::STATUS_ACTIVE => Yii::t('backend', "Active"),
        ];
    }
}
