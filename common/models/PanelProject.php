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
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'mainImage',
                'pathAttribute' => 'image',
                'baseUrlAttribute' => 'image_url',
            ],
            PositionBehavior::className(),
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
            'id' => Yii::t('backend', 'ID'),
            'name' => Yii::t('backend', 'Name'),
            'image' => Yii::t('backend', 'Image'),
            'active' => Yii::t('backend', 'Active'),
            'position' => Yii::t('backend', 'Position'),
            'title' => Yii::t('backend', 'Title'),
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
    
    public function getGlideImage()
    {
        return ['/glide', 'path' => $this->image, 'w' => 210, 'h' => 158, 'fit' => 'fill'];
    }
    
    public static function statuses()
    {
        return [
            !self::STATUS_ACTIVE => Yii::t('backend', "Inactive"),
            self::STATUS_ACTIVE => Yii::t('backend', "Active"),
        ];
    }
    
    public static function savePositions($data)
    {
        if (empty($data) || !is_array($data)) {
            return false;
        }

        foreach ($data as $id => $position) {
            Yii::$app->db->createCommand()->update(self::tableName(), [
                'position' => (int)$position,
            ], 'id = ' . (int)$id)->execute();
        }

        return true;
    }
}
