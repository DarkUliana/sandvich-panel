<?php

namespace common\models\translation;

use \common\models\WidgetText;
use Yii;

/**
 * This is the model class for table "{{%widget_text_translation}}".
 *
 * @property integer $widget_id
 * @property string $language
 * @property string $title
 * @property string $body
 *
 * @property WidgetText $widget
 */
class WidgetTextTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%widget_text_translation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['widget_id'], 'integer'],
            [['body'], 'string'],
            [['language'], 'string', 'max' => 16],
            [['title'], 'string', 'max' => 512],
            [['widget_id'], 'exist', 'skipOnError' => true, 'targetClass' => WidgetText::className(), 'targetAttribute' => ['widget_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'widget_id' => Yii::t('backend', 'ID'),
            'language' => Yii::t('backend', 'Language'),
            'title' => Yii::t('backend', 'Title'),
            'body' => Yii::t('backend', 'Body'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWidget()
    {
        return $this->hasOne(WidgetText::className(), ['id' => 'widget_id']);
    }
}
