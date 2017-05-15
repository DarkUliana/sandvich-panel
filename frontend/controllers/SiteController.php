<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use \yii\web\NotFoundHttpException;
use yii\web\Response;
use \yii\bootstrap\ActiveForm;
use \frontend\forms\FeedbackForm;

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
        return $this->render('index', [
            'model' => Yii::createObject(FeedbackForm::className()),
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
        
        if ($form->load($_POST) && $form->save()) {
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
