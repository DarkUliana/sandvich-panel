<?php

namespace common\models;

use Yii;

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
    /**
     * @inheritdoc
     */
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
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'image' => Yii::t('app', 'Image'),
            'active' => Yii::t('app', 'Active'),
            'position' => Yii::t('app', 'Position'),
        ];
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
}
