<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%checkerboard}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property integer $active
 * @property integer $position
 *
 * @property CheckerboardTranslation[] $checkerboardTranslations
 */
class Checkerboard extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%checkerboard}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image'], 'required'],
            [['active', 'position'], 'integer'],
            [['name', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'image' => Yii::t('app', 'Image'),
            'active' => Yii::t('app', 'Active'),
            'position' => Yii::t('app', 'Position'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCheckerboardTranslations()
    {
        return $this->hasMany(CheckerboardTranslation::className(), ['checkerboard_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return CheckerboardQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CheckerboardQuery(get_called_class());
    }
}
