<?php

namespace common\models;

use backend\behaviors\TranslationSaveBehavior;
use common\models\translation\WidgetTextTranslation;
use creocoder\translateable\TranslateableBehavior;
use Yii;

/**
 * This is the model class for table "{{%widget_text}}".
 *
 * @property integer $id
 * @property string $key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $name
 *
 * @property WidgetTextTranslation[] $widgetTextTranslations
 */
class WidgetText extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = true;
    
    public function behaviors()
    {
        return [
            \yii\behaviors\TimestampBehavior::className(),
            'translateable' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['title'],
            ],
            [
                'class' => TranslationSaveBehavior::className(),
                'translationClassName' => WidgetTextTranslation::className(),
            ],

        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%widget_text}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['status'], 'boolean'],
            [['key', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'key' => Yii::t('backend', 'Key'),
            'status' => Yii::t('backend', 'Status'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'name' => Yii::t('backend', 'Name'),
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_INSERT | self::OP_UPDATE,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslations()
    {
        return $this->hasMany(WidgetTextTranslation::className(), ['widget_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslationDefault()
    {
        return $this->hasOne(WidgetTextTranslation::className(), ['widget_id' => 'id'])->andOnCondition(['language' => Yii::$app->language]);
    }

    /**
     * @inheritdoc
     * @return WidgetTextQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WidgetTextQuery(get_called_class());
    }
    
    public static function statuses()
    {
        return [
            !self::STATUS_ACTIVE => Yii::t('backend', "Inactive"),
            self::STATUS_ACTIVE => Yii::t('backend', "Active"),
        ];
    }
}
