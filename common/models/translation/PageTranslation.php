<?php

namespace common\models\translation;

use Yii;

/**
 * This is the model class for table "{{%page_translation}}".
 *
 * @property integer $page_id
 * @property string $language
 * @property string $title
 * @property string $body
 * @property string $tkd_title
 * @property string $tkd_keyword
 * @property string $tkd_description
 */
class PageTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%page_translation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['body', 'tkd_description'], 'string'],
            [['language'], 'string', 'max' => 16],
            [['title'], 'string', 'max' => 512],
            [['tkd_title', 'tkd_keyword'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'page_id' => Yii::t('common', 'Page ID'),
            'language' => Yii::t('common', 'Language'),
            'title' => Yii::t('common', 'Title'),
            'body' => Yii::t('common', 'Body'),
            'tkd_title' => Yii::t('common', 'Tkd Title'),
            'tkd_keyword' => Yii::t('common', 'Tkd Keyword'),
            'tkd_description' => Yii::t('common', 'Tkd Description'),
        ];
    }
}