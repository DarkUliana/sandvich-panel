<?php

namespace common\models\translation;

use Yii;
use common\models\Page;

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
 *
 * @property Page $page
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
            [['page_id'], 'integer'],
            [['body', 'tkd_description'], 'string'],
            [['language'], 'string', 'max' => 16],
            [['title'], 'string', 'max' => 512],
            [['tkd_title', 'tkd_keyword'], 'string', 'max' => 255],
            [['page_id'], 'exist', 'skipOnError' => true, 'targetClass' => Page::className(), 'targetAttribute' => ['page_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'page_id' => Yii::t('app', 'Page ID'),
            'language' => Yii::t('app', 'Language'),
            'title' => Yii::t('app', 'Title'),
            'body' => Yii::t('app', 'Body'),
            'tkd_title' => Yii::t('app', 'Tkd Title'),
            'tkd_keyword' => Yii::t('app', 'Tkd Keyword'),
            'tkd_description' => Yii::t('app', 'Tkd Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(Page::className(), ['id' => 'page_id']);
    }
}
