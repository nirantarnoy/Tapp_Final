<?php

namespace backend\controllers;

use Yii;
use backend\models\Dashboard;
use backend\models\DashboardSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\Models\Vcarclose;
use yii\web\Session;

/**
 * DashboardController implements the CRUD actions for Dashboard model.
 */
class DashboardController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Dashboard models.
     * @return mixed
     */
    public function actionIndex()
    {
        $carclose = Vcarclose::find()->all();
        $searchModel = new DashboardSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $modelcount = Vcarclose::find()->count();
         
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'carclose'=>$carclose,
             'modelcount'=>$modelcount,
        ]);
    }

    /**
     * Displays a single Dashboard model.
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
     * Creates a new Dashboard model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Dashboard();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->car4_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    public function actionSearchclose()
    {
      if(\Yii::$app->request->post())
      {
          
          $brand = $_POST['brand']==' '?'%%':$_POST['brand'];
          $brand1 = $_POST['brand1']==' '?'%%':$_POST['brand1'];
          $tabain = $_POST['tabain']==' '?'%%':$_POST['tabain'];
         
         // $model = Vcarclose::find()->where(['like','brand',$brand])->all();
          $modelcount = Vcarclose::find()->where(['LIKE','brand',$brand])->andWhere(['LIKE','o1',$brand1])->andWhere(['LIKE','tabain',$tabain])->count();
          $model = Vcarclose::find()->where(['LIKE','brand',$brand])->andWhere(['LIKE','o1',$brand1])->andWhere(['LIKE','tabain',$tabain])->all();
            $searchModel = new DashboardSearch();
          $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
       
       // if($modelcount>0){
             return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'carclose'=>$model,
            'modelcount'=>$modelcount,
        ]);
       // }else{
           
       // }
       
      }
    }
    /**
     * Updates an existing Dashboard model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->car4_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Dashboard model.
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
     * Finds the Dashboard model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dashboard the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dashboard::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
