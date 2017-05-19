<?php

namespace common\models\translation;

use Yii;

use common\models\RefrigerationEquipment;


/**
 * This is the model class for table "{{%refrigeration_equipment_translation}}".
 *
 * @property integer $equipment_id
 * @property string $language
 * @property string $title
 *
 * @property RefrigerationEquipment $equipment
 */
class RefrigerationEquipmentTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%refrigeration_equipment_translation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['equipment_id'], 'integer'],
            [['language'], 'string', 'max' => 16],
            [['title'], 'string', 'max' => 512],
            [['equipment_id'], 'exist', 'skipOnError' => true, 'targetClass' => RefrigerationEquipment::className(), 'targetAttribute' => ['equipment_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'equipment_id' => Yii::t('backend', 'ID'),
            'language' => Yii::t('backend', 'Language'),
            'title' => Yii::t('backend', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipment()
    {
        return $this->hasOne(RefrigerationEquipment::className(), ['id' => 'equipment_id']);
    }
}
