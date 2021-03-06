<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use \yii\web\NotFoundHttpException;
use yii\web\Response;
use \yii\bootstrap\ActiveForm;
use \frontend\forms\FeedbackForm;
use \frontend\models\search\MenuSearch;
use \frontend\models\search\PageSearch;
use \frontend\models\search\CheckerboardSearch;
use \frontend\models\search\PanelProjectSearch;
use \frontend\models\search\PhoneSearch;
use \frontend\models\search\RefrigerationEquipmentSearch;
use \frontend\models\search\WidgetTextSearch;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ],
            'glide' => '\\trntv\\glide\\actions\\GlideAction',
            'set-locale'=>[
                'class'=>'common\actions\SetLocaleAction',
                'locales'=>array_keys(Yii::$app->params['availableLocales'])
            ]
        ];
    }
    
    public function behaviors()
    {
        return [
            'verb-filter' => [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    'send' => ['get', 'post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        //var_dump(Yii::$app->keyStorage->get('address_'.Yii::$app->language));die();
        //var_dump(Yii::$app->request->get()); die();
        return $this->render('index', [
            'model' => Yii::createObject(FeedbackForm::className()),
            'menu' => MenuSearch::getAll(),
            'page' => PageSearch::getOne(),
            'checkerboard' => CheckerboardSearch::getAll(),
            'project' => PanelProjectSearch::getAll(),
            'phone' => PhoneSearch::getAll(),
            'equipment' => RefrigerationEquipmentSearch::getAll(),
            'widgetText' => WidgetTextSearch::getAll(),
            'key_value' => [
                'email' => Yii::$app->keyStorage->get('feedback_email'),
                'address' => Yii::$app->keyStorage->get('address_'.Yii::$app->language),
                    ],
            'locale' => Yii::$app->params['availableLocales'],
            'language' => Yii::$app->language
        ]);
    }
    
    public function actionSend()
    {
        if (!Yii::$app->request->isAjax) {
            throw new NotFoundHttpException();
        }
        
        $form = Yii::createObject(FeedbackForm::className());
        
        if (Yii::$app->request->isAjax && $form->load(Yii::$app->request->post())) {
            $validate = ActiveForm::validate($form);
            
            if (!empty($validate)) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                Yii::$app->response->data = $validate;
                Yii::$app->response->send();
                Yii::$app->end();
            }
        }
        
        if ($form->load(Yii::$app->request->post()) && $form->save()) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            Yii::$app->response->data = ['status' => true];
            Yii::$app->response->send();
            Yii::$app->end();
        } else {
            return $this->renderAjax('/include/_send_form', [
                'model' => $form,
            ]);
        }
    }
    
    public function actionResult()
    {
        if (!Yii::$app->request->isAjax) {
            throw new NotFoundHttpException();
        }
        
        return $this->renderAjax('/include/_res_form');
    }
}
