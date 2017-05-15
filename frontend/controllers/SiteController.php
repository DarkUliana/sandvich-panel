<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use \yii\web\NotFoundHttpException;

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
        return $this->render('index');
    }
    
    public function actionSend()
    {
        if (!Yii::$app->request->isAjax) {
            throw new NotFoundHttpException();
        }
        
        return $this->renderAjax('/include/_send_form');
    }
}
