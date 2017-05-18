<?php

namespace common\models;

use Yii;
use backend\behaviors\TranslationSaveBehavior;
use common\models\translation\RefrigerationEquipmentTranslation;
use creocoder\translateable\TranslateableBehavior;
use trntv\filekit\behaviors\UploadBehavior;

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
     * @const boolean
     */
    const STATUS_ACTIVE = true;
    
    /**
     * @var array
     */
    public $mainImage;
    
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
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'mainImage',
                'pathAttribute' => 'image',
                'baseUrlAttribute' => 'image_url',
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
            [['active', 'position'], 'integer'],
            [['name', 'image'], 'string', 'max' => 255],
            [['mainImage'], 'safe'],
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
     * @inheritdoc
     * @return RefrigerationEquipmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RefrigerationEquipmentQuery(get_called_class());
    }
    
    public function getGlideImage()
    {
        return ['/glide', 'path' => $this->image, 'w' => 250, 'h' => 154, 'fit' => 'fill'];
    }
    
    public static function statuses()
    {
        return [
            !self::STATUS_ACTIVE => Yii::t('common', "Inactive"),
            self::STATUS_ACTIVE => Yii::t('common', "Active"),
        ];
    }
}
