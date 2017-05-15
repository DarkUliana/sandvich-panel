<?php

namespace common\models\translation;

use Yii;

/**
 * This is the model class for table "{{%menu_translation}}".
 *
 * @property integer $menu_id
 * @property string $language
 * @property string $title
 *
 * @property Menu $menu
 */
class MenuTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menu_translation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu_id', 'language', 'title'], 'required'],
            [['menu_id'], 'integer'],
            [['language'], 'string', 'max' => 16],
            [['title'], 'string', 'max' => 512],
            [['menu_id'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['menu_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'menu_id' => Yii::t('app', 'Menu ID'),
            'language' => Yii::t('app', 'Language'),
            'title' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(Menu::className(), ['id' => 'menu_id']);
    }
}
