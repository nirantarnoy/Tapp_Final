<?php

namespace backend\controllers;

use Yii;
use backend\models\Car4;
use backend\models\Car4Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\Session;
use yii\data\Pagination;

/**
 * Car4Controller implements the CRUD actions for Car4 model.
 */
class Car4Controller extends Controller {

    public function behaviors() {
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
     * Lists all Car4 models.
     * @return mixed
     */
    public function actionIndex() {
        $session = new Session();
        $session->open();
        
        $page = 30;
        if(isset($session["perpage"])){
            $page = $session["perpage"];
        }
        
//        if(\Yii::$app->request->isAjax){
//            $page =(integer) \Yii::$app->request->post('page');
//           
//            return;
//        }
//        
        $searchModel = new Car4Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = $page;

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
            'perpagex'=>$page,
        ]);
    }
   

    /**
     * Displays a single Car4 model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Car4 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Car4();



        if ($model->load(Yii::$app->request->post())) {
            //$uploaded = UploadedFile::getInstance($model, 'myfile');
            $uploaded = UploadedFile::getInstances($model, 'myfile');
            if (!empty($uploaded)) {
                $x = 0;

                foreach ($uploaded as $xfiles) {
                    $x++;
                    $file = "F" . $x . "." . $xfiles->getExtension();
                    $xfile[] = $file;
                    $xfiles->saveAs('../../uploads/' . $file);
                }

                foreach ($xfile as $m) {

                    $filename = '../../uploads/' . $m;

                    $excelfile = \PHPExcel_IOFactory::identify($filename);
                    $objReader = \PHPExcel_IOFactory::createReader($excelfile);
                    $objfile = $objReader->load($filename);

                    $sheet = $objfile->getSheet(0);
                    $rowcount = $sheet->getHighestRow();
                    $columncount = $sheet->getHighestColumn();
                    $result = 0;
                    for ($row = 0; $row <= $rowcount; $row++) {
                        $rowdata = $sheet->rangeToArray('A' . $row . ':' . $columncount . $row, NULL, TRUE, FALSE);
                        if ($row <=2) {
                            continue;
                        }
                        $name = $rowdata[0][2];
                       
                        //$gen = explode("/", $name);
                        $gen = explode(" ", $name);
                        if ($name == '') {
                            continue;
                        }
                        //  echo $rowdata[0][2].'<BR />';
                        // foreach ($gen as $x){echo $x.'<BR />';}
                        // echo $gen[0] . ' ' . $gen[1] . ' ' . $gen[2];
                        //if($row>1){return;}
                        $model2 = new \backend\Models\Car4();

                        $model2->brand = $rowdata[0][1];
                        $model2->gen = $rowdata[0][2];
                        $model2->o1 = isset($gen[1]) ? $gen[1] : '';
                        $model2->o2 = isset($gen[2]) ? $gen[2] : '';
                        $model2->o3 = isset($gen[3]) ? $gen[3] : '';
                        $model2->o4 = isset($gen[4]) ? $gen[4] : '';
                        $model2->o5 = isset($gen[5]) ? $gen[5] : '';
                        $model2->o6 = isset($gen[6]) ? $gen[6] : '';
                        $model2->o7 = isset($gen[7]) ? $gen[7] : '';
                        $model2->o8 = isset($gen[8]) ? $gen[8] : '';
                        $model2->o9 = isset($gen[9]) ? $gen[9] : '';
                        $model2->o10 = isset($gen[10]) ? $gen[10] : '';
                        $model2->o11 = isset($gen[11]) ? $gen[11] : '';
                        $model2->o12 = isset($gen[12]) ? $gen[12] : '';
                        $model2->o13 = isset($gen[13]) ? $gen[13] : '';
                        $model2->o14 = isset($gen[14]) ? $gen[14] : '';
                        $model2->o15 = isset($gen[15]) ? $gen[15] : '';
                        $model2->o16 = isset($gen[16]) ? $gen[16] : '';
                        $model2->o17 = isset($gen[17]) ? $gen[17] : '';
                        $model2->o18 = isset($gen[18]) ? $gen[18] : '';
                        $model2->o19 = isset($gen[19]) ? $gen[19] : '';
                        $model2->o20 = isset($gen[20]) ? $gen[20] : '';                           
                        $model2->year = (string)$rowdata[0][23];
                        $model2->id= (string)$rowdata[0][24];
                        $model2->close= (string)$rowdata[0][25];
                        $model2->open= (string)$rowdata[0][26];
                        $model2->tabain= (string)$rowdata[0][27];
                       $model2->mile= (string)$rowdata[0][28];
                       $model2->serialbox= (string)$rowdata[0][29];
                      $model2->serialmachine= (string)$rowdata[0][30];
                      $model2->arena= (string)$rowdata[0][31];
                      $model2->datearena= (string)$rowdata[0][32];
                      $model2->detail= (string)$rowdata[0][33];
                      $model2->pricevat= (string)$rowdata[0][34];
                        

                        if ($model2->save()) {
                            $result++;
                        }
                    }
                    unlink($filename);
//                    echo ' 
//                         <div class="progress">
//        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
//60%
//  </div>
//    </div>
//                      '
//                    ;
                }
                // $upfiles = time() . "." . $uploaded->getExtension();
                // if ($uploaded->saveAs('../../uploads/' . $upfiles)) {
                //  $handle = fopen('../../uploads/' . $upfiles, 'r');
                //  }
//                echo $handle;
//                                return;
            }
            if ($result > 0) {
                $session = new Session();
                $session->open();
                $session->setFlash('msg', 'บันทึกข้อมูลเรียบร้อย');
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Car4 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
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
     * Deletes an existing Car4 model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        $session = new Session();
                $session->open();
                $session->setFlash('msg', 'ทำรายการเรียบร้อย');
        return $this->redirect(['index']);
    }
    public function actionMultidelete() {
        if (\yii::$app->request->isAjax) {
            $pk = \yii::$app->request->post('pk');
            foreach($pk as $data){
                $this->findModel($data)->delete();
            }
        }
                $session = new Session();
                $session->open();
                $session->setFlash('msg', 'ทำรายการเรียบร้อย');
        return $this->redirect(['index']);
    }
    public function actionShowbyper()
    {
         if (\yii::$app->request->isAjax) {
            $page = \yii::$app->request->post('pk');
            
//             $searchModel = new Car4Search();
//            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//            $dataProvider->pagination->pageSize = $page;
         if($page > 0){
               $session = new Session();
        $session->open();
        $session["perpage"] = $page;
        return $this->redirect('index.php?r=car4/index');
        }
         }
    }

    /**
     * Finds the Car4 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Car4 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Car4::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
