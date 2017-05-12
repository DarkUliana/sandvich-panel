<?php

namespace common\models;

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
            [['key', 'name'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['key', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'key' => Yii::t('app', 'Key'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWidgetTextTranslations()
    {
        return $this->hasMany(WidgetTextTranslation::className(), ['widget_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return WidgetTextQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WidgetTextQuery(get_called_class());
    }
}
