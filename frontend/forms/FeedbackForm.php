<?php

namespace frontend\forms;

use common\models\Feedback;
use Yii;

/**
 * Description of FeedbackForm
 *
 * @author www
 */
class FeedbackForm extends \yii\base\Model
{
    public $name;
    public $phone;
    public $email;
    
    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            [['name', 'phone'], 'string', 'max'=> 255],
            [['email'], 'email'],
        ];
    }
    
    public function save()
    {
        if (!$this->validate()) {
            return false;
        }
        
        $feedback = Yii::createObject([
            'class' => Feedback::className(),
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'check' => Feedback::STATUS_DEFAULT,
            'datetime' => Yii::$app->formatter->asDatetime(time(), 'php:Y-m-d H:i:s'),
        ]);
        return $feedback->save();
    }
}
