<?php

namespace common\models;

use backend\behaviors\PositionBehavior;
use backend\behaviors\TranslationSaveBehavior;
use common\models\translation\PanelProjectTranslation;
use creocoder\translateable\TranslateableBehavior;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;

/**
 * This is the model class for table "{{%panel_project}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property integer $active
 * @property integer $position
 *
 * @property PanelProjectTranslation[] $panelProjectTranslations
 */
class PanelProject extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = true;
    
    public $mainImage;
    
    public function behaviors()
    {
        return [

            'translateable' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['title'],
            ],
            [
                'class' => TranslationSaveBehavior::className(),
                'translationClassName' => PanelProjectTranslation::className(),
            ],
            PositionBehavior::className(),
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'mainImage',
                'pathAttribute' => 'image',
                'baseUrlAttribute' => 'image_url',
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%panel_project}}';
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
        return $this->hasMany(PanelProjectTranslation::className(), ['panel_project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslationDefault()
    {
        return $this->hasOne(PanelProjectTranslation::className(), ['panel_project_id' => 'id'])->andOnCondition(['language' => Yii::$app->language]);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPanelProjectTranslations()
    {
        return $this->hasMany(PanelProjectTranslation::className(), ['panel_project_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return PanelProjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PanelProjectQuery(get_called_class());
    }
    
    public static function statuses()
    {
        return [
            !self::STATUS_ACTIVE => Yii::t('common', "Inactive"),
            self::STATUS_ACTIVE => Yii::t('common', "Active"),
        ];
    }
}
