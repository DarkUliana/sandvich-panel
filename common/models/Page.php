<?php

namespace common\models;

use backend\behaviors\TranslationSaveBehavior;
use common\models\translation\PageTranslation;
use creocoder\translateable\TranslateableBehavior;
use Yii;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $view
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Page extends ActiveRecord
{
    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%page}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'slug' => [
                'class' => SluggableBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_AFTER_VALIDATE => 'slug',
                ],
                'attribute' => 'title',
                'ensureUnique' => true,
                'immutable' => true,
            ],
            'translateable' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['title', 'body', 'tkd_title', 'tkd_keyword', 'tkd_description'],
            ],
            [
                'class' => TranslationSaveBehavior::className(),
                'translationClassName' => PageTranslation::className(),
            ],
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
        return $this->hasMany(PageTranslation::className(), ['page_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslationDefault()
    {
        return $this->hasOne(PageTranslation::className(), ['page_id' => 'id'])->andOnCondition(['language' => Yii::$app->language]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['slug'], 'unique'],
            [['slug'], 'string', 'max' => 2048],
            [['view'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'slug' => Yii::t('common', 'Slug'),
            'name' => Yii::t('common', 'Inside Name'),
            'view' => Yii::t('common', 'Page View'),
            'status' => Yii::t('common', 'Active'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }

    /**
     * Return page statuses
     * @return array
     */
    public static function statuses()
    {
        return [
            self::STATUS_DRAFT => Yii::t('common', "Inactive"),
            self::STATUS_PUBLISHED => Yii::t('common', "Active"),
        ];
    }
}