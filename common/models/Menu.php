<?php

namespace common\models;

use backend\behaviors\PositionBehavior;
use backend\behaviors\TranslationSaveBehavior;
use common\models\translation\MenuTranslation;
use creocoder\translateable\TranslateableBehavior;
use Yii;

/**
 * This is the model class for table "{{%menu}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $active
 * @property integer $position
 * @property string $slug
 *
 * @property MenuTranslation[] $menuTranslations
 */
class Menu extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = true;
    
    public function behaviors()
    {
        return [
            'translateable' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['title'],
            ],
            [
                'class' => TranslationSaveBehavior::className(),
                'translationClassName' => MenuTranslation::className(),
            ],
            PositionBehavior::className(),
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active', 'position'], 'integer'],
            [['slug'], 'required'],
            [['name', 'slug'], 'string', 'max' => 255],
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
            'active' => Yii::t('backend', 'Active'),
            'position' => Yii::t('backend', 'Position'),
            'slug' => Yii::t('backend', 'Slug'),
            'title' => Yii::t('backend', 'Title'),
        ];
    }
    
    public function getTranslations()
    {
        return $this->hasMany(MenuTranslation::className(), ['menu_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslationDefault()
    {
        return $this->hasOne(MenuTranslation::className(), ['menu_id' => 'id'])->andOnCondition(['language' => Yii::$app->language]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuTranslations()
    {
        return $this->hasMany(MenuTranslation::className(), ['menu_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\MenuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\MenuQuery(get_called_class());
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
