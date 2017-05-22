<?php
namespace backend\models;

use cheatsheet\Time;
use common\models\User;
use Yii;
use yii\base\Exception;
use yii\base\Model;
use yii\web\ForbiddenHttpException;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;
    public $reCaptcha;

    private $user = false;
    
    const SCENARIO_DEV = 'development_scenario';
    const SCENARIO_PROD = 'production_scenario';

    public function init()
    {
        parent::init();

        $this->scenario = self::SCENARIO_DEV;
        if (YII_ENV_PROD && env('GOOGLE_CAPTCHA_SITE_KEY') && env('GOOGLE_CAPTCHA_SECRET_KEY')) {
            $this->scenario = self::SCENARIO_PROD;
        }
    }
    
    public function scenarios()
    {
        return [
            self::SCENARIO_DEV => ['username', 'password', 'rememberMe'],
            self::SCENARIO_PROD => ['username', 'password', 'rememberMe', 'reCaptcha'],
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
        if (YII_ENV_PROD && env('GOOGLE_CAPTCHA_SITE_KEY') && env('GOOGLE_CAPTCHA_SECRET_KEY')) {
            $rules[] = [
                'reCaptcha',
                \himiklab\yii2\recaptcha\ReCaptchaValidator::className(),
                'uncheckedMessage' => Yii::t('backend', "Please check «I am not Robot»"),
                'secret' => env('GOOGLE_CAPTCHA_SECRET_KEY')
            ];
        }
        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('backend', 'Username'),
            'password' => Yii::t('backend', 'Password'),
            'rememberMe' => Yii::t('backend', 'Remember Me'),
            'reCaptcha' => Yii::t('backend', 'Captcha'),
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     */
    public function validatePassword()
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError('password', Yii::t('backend', 'Incorrect username or password.'));
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     * @throws ForbiddenHttpException
     */
    public function login()
    {
        if (!$this->validate()) {
            return false;
        }
        $duration = $this->rememberMe ? Time::SECONDS_IN_A_MONTH : 0;
        if (Yii::$app->user->login($this->getUser(), $duration)) {
            if (!Yii::$app->user->can('loginToBackend')) {
                Yii::$app->user->logout();
                throw new ForbiddenHttpException;
            }
            return true;
        }

        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->user === false) {
            $this->user = User::find()
                ->andWhere(['or', ['username'=>$this->username], ['email'=>$this->username]])
                ->one();
        }

        return $this->user;
    }
}
