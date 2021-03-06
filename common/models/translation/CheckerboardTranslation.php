<?php

namespace common\models\translation;

use Yii;
use common\models\Checkerboard;

/**
 * This is the model class for table "{{%checkerboard_translation}}".
 *
 * @property integer $checkerboard_id
 * @property string $language
 * @property string $title
 * @property string $body
 *
 * @property Checkerboard $checkerboard
 */
class CheckerboardTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%checkerboard_translation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['checkerboard_id'], 'integer'],
            [['body'], 'string'],
            [['language'], 'string', 'max' => 16],
            [['title'], 'string', 'max' => 512],
            [['checkerboard_id'], 'exist', 'skipOnError' => true, 'targetClass' => Checkerboard::className(), 'targetAttribute' => ['checkerboard_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'checkerboard_id' => Yii::t('backend', 'ID'),
            'language' => Yii::t('backend', 'Language'),
            'title' => Yii::t('backend', 'Title'),
            'body' => Yii::t('backend', 'Body'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCheckerboard()
    {
        return $this->hasOne(Checkerboard::className(), ['id' => 'checkerboard_id']);
    }
}
