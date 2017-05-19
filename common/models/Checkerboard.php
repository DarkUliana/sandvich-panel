<?php

namespace common\models;

use backend\behaviors\TranslationSaveBehavior;
use common\models\translation\CheckerboardTranslation;
use creocoder\translateable\TranslateableBehavior;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;

/**
 * This is the model class for table "{{%checkerboard}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $image_url
 * @property integer $active
 * @property integer $position
 *
 * @property CheckerboardTranslation[] $checkerboardTranslations
 */
class Checkerboard extends \yii\db\ActiveRecord
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
                'translationClassName' => CheckerboardTranslation::className(),
            ],
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
        return '{{%checkerboard}}';
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslations()
    {
        return $this->hasMany(CheckerboardTranslation::className(), ['checkerboard_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslationDefault()
    {
        return $this->hasOne(CheckerboardTranslation::className(), ['checkerboard_id' => 'id'])->andOnCondition(['language' => Yii::$app->language]);
    }
    
    public function getCheckerboardTranslations()
    {
        return $this->hasMany(CheckerboardTranslation::className(), ['checkerboard_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return CheckerboardQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CheckerboardQuery(get_called_class());
    }
    
    public function getGlideImage()
    {
        return ['/glide', 'path' => $this->image, 'w' => 570, 'h' => 290, 'fit' => 'fill'];
    }
    
    public static function statuses()
    {
        return [
            !self::STATUS_ACTIVE => Yii::t('backend', "Inactive"),
            self::STATUS_ACTIVE => Yii::t('backend', "Active"),
        ];
    }
}
