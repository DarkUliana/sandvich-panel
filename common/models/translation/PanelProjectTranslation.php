<?php

namespace common\models\translation;

use Yii;
use \common\models\PanelProject;

/**
 * This is the model class for table "{{%panel_project_translation}}".
 *
 * @property integer $panel_project_id
 * @property string $language
 * @property string $title
 * @property string $body
 *
 * @property PanelProject $panelProject
 */
class PanelProjectTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%panel_project_translation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['panel_project_id'], 'integer'],
            [['body'], 'string'],
            [['language'], 'string', 'max' => 16],
            [['title'], 'string', 'max' => 512],
            [['panel_project_id'], 'exist', 'skipOnError' => true, 'targetClass' => PanelProject::className(), 'targetAttribute' => ['panel_project_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'panel_project_id' => Yii::t('app', 'Panel Project ID'),
            'language' => Yii::t('app', 'Language'),
            'title' => Yii::t('app', 'Title'),
            'body' => Yii::t('app', 'Body'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPanelProject()
    {
        return $this->hasOne(PanelProject::className(), ['id' => 'panel_project_id']);
    }
}
