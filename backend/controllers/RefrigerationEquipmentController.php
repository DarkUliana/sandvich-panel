<?php

namespace backend\controllers;

use Yii;
use common\models\RefrigerationEquipment;
use backend\models\search\RefrigerationEquipmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RefrigerationEquipmentController implements the CRUD actions for RefrigerationEquipment model.
 */
class RefrigerationEquipmentController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all RefrigerationEquipment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->actionPjax();
        
        $searchModel = new RefrigerationEquipmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionPjax()
    {
        if (!Yii::$app->request->isPjax) {
            return;
        }
        
        $equipment = RefrigerationEquipment::findOne(Yii::$app->request->get('id'));
        if ($equipment instanceof RefrigerationEquipment) {
            $active = (bool)Yii::$app->request->get('active');
            $equipment->updateAttributes(['active' => $active]);
        }
    }
    
    public function actionPosition()
    {
        if (!Yii::$app->request->isAjax) {
            throw new NotFoundHttpException();
        }

        RefrigerationEquipment::savePositions(Yii::$app->request->post('positions'));
    }

    /**
     * Displays a single RefrigerationEquipment model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RefrigerationEquipment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RefrigerationEquipment();
        $model->active = RefrigerationEquipment::STATUS_ACTIVE;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RefrigerationEquipment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RefrigerationEquipment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RefrigerationEquipment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RefrigerationEquipment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RefrigerationEquipment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
