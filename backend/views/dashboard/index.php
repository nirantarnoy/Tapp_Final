<?php

use yii\helpers\Html;
use yii\grid\GridView;
use miloschuman\highcharts\Highcharts;
use yii\helpers\ArrayHelper;
use backend\Models\Vcarcount;
use backend\Models\Vcarclose;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DashboardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dashboards And Reports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dashboard-index">
    <!-- callout -->
    <div class='callout callout-info'>
        <h4><?= Html::encode($this->title) ?></h4>
        <p>เพจสำหรับแสดงข้อมูลภาพรวมของระบบอัพโหลดข้อมูลรถยนต์จากไฟล์ Excel</p>
    </div>
    <!-- /.callout -->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">

    </div>
    <div id="btnsearch" style="margin-bottom: 5px;" class="btn btn-success">ค้นหาขั้นสูง</div>

    <div class="row">
        <div class="col-lg-8"> 

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">ราคาจบ(-Vat)</h4>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="glyphicon glyphicon-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="glyphicon glyphicon-remove"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">

                    <div id="search">

                        <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
                        <?php yii\bootstrap\ActiveForm::begin(['id'=>'myform','action'=>'index.php?r=dashboard/searchclose']) ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <!--             <label class="control-label col-sm-3" for="inputSuccess3">สนาม</label>
                                    <div class="col-sm-9">
                                <?php //echo $form->field($model, 'serialbox')->label(false) ?>
                                       
                                    </div>-->

                                <label class="control-label col-sm-3" for="inputSuccess3">ยี่ห้อ</label>
                                <div class="col-sm-9" style="margin-bottom: 10px;" >
                                    <input type="text" name="brand" value="" class="form-control">

                                </div>
                               
                                <label style="top: 10px;" class="control-label col-sm-3" for="inputSuccess3">รุ่น</label>
                                <div class="col-sm-9">
                                   <input type="text" name="brand1" value="" class="form-control">

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="control-label col-sm-3" for="inputSuccess3">ทะเบียน</label>
                                <div class="col-sm-9" style="margin-bottom: 10px;">
                                   <input type="text" name="tabain" value="" class="form-control">

                                </div>
                                 <label style="top: 10px;" class="control-label col-sm-3" for="inputSuccess3"></label>
                                <div class="col-sm-9">
                                  <input type="submit" value="ตกลง" class="btn btn-primary">

                                </div>
                                

                            </div>
                        </div>
                        <?php yii\bootstrap\ActiveForm::end() ?>
                        <br />    

                    </div>

                    <?php if($modelcount <=0):?>
                    <div class="alert alert-danger">
                        <i class="">ไม่พบข้อมูล</i>
                    </div>
                    
                    <?php
                    return;
                    endif;
                    ?>

                    <?php
                    //     $model = $dataProvider->getModels();
                  
                    if($modelcount <=0){
                        
                        return;
                    }
                    $model = $carclose;
                    
                      
//                   $model = Vcarclose::find()->all();
//                  $titlename = ['1', '2', '3','4','5','6','7'];
//                  $dataamt = [100000, 350000, 400000,500000, 700000, 300000, 800000];
                    $titlename;
                    //    $dataamt[] = null;
//                  $dataamt2[] = null;
                    // foreach ($model as $data){$titlename[] = $data->brand;}
                   
                    foreach ($model as $data2) {
                        $titlename[] = $data2->tabain;
                        // array_push($titlename, $data2->tabain);
                        //  $dataamt[] = $data2->close;
                        $month[] = $data2->month;
//                       $xdata = [];            
//                       for($c=1;$c<=12;$c++){
//                           $xcount = Vcarclose::find()->where(['month'=>$c,'tabain'=>$data2->tabain])->count();
//                           $val = Vcarclose::find()->where(['month'=>$c])->one();
//                           if($xcount > 0)
//                           {
//                               array_push($xdata, (int)$val->close);
//                           }else{
//                               array_push($xdata, 0);
//                           }
//                       }
//                        $dataamt[] = $xdata;
                        // var_dump($dataamt);
                    }


                    $seri = [];
                    $len = count($titlename);

                    for ($a = 0; $a <= $len - 1; $a++) {
                        $xdata = [];
                        for ($c = 1; $c <= 12; $c++) {
                            $xcount = Vcarclose::find()->where(['month' => $c, 'tabain' => $titlename[$a]])->count();
                            $val = Vcarclose::find()->where(['month' => $c, 'tabain' => $titlename[$a]])->one();
                            if ($xcount > 0) {
                                array_push($xdata, (int) $val->close);
                            } else {
                                array_push($xdata, 0);
                            }
                        }
                        //[] = $xdata;



                        array_push($seri, ['name' => $titlename[$a], 'data' => $xdata]);
                        // array_push($seri, ['name'=>$titlename[$a],'data'=>[(int)$dataamt[$a],0,0,0,0,0,0,0,0,0,0,0]]);
                    }

                    // $titlename = $model->brand;

                    echo Highcharts::widget([
                        'options' => [
                            'title' => ['text' => ''],
                            'xAxis' => [
                                'title' => ['text' => ''],
                                'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                            //       'categories'=> $titlename
                            ],
                            'yAxis' => [
                                'title' => ['text' => 'ราคาจบ'],
                                'gridLineColor' => '#cccccc',
                                // 'plotLines'=>['color'=>'#000000'],
                                'type' => 'linear',
                            //'visible'=>false,
                            ],
                            'series' => $seri,
//                       'series' => [                     
//                           ['name' => ArrayHelper::getColumn($seri, 'name'), 'data' =>ArrayHelper::getValue($seri, 'data')],
//                       
//                  //       ['name' => 'Mazda', 'data' => $dataamt ],
////                         ['name' => '3', 'data' => [50000, 700000, 300000] ],
////                          ['name' => 'John', 'data' => [5000, 70007, 389999]],
//                          ['type'=>'line',
//                            'color'=>'#ffffff',
//                            'dashStyle'=>'Dash',
//                          ],
//                       ],
                            'credits' => ['enabled' => false],
                            'chart' => [
                                'type' => 'scatter',
                            // 'style'=>['lineColor'=>'white'],
                            ],
                        ]
                    ]);
                    ?>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <div class="col-lg-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">จำนวนรถในระบบ (คัน)</h4>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="glyphicon glyphicon-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="glyphicon glyphicon-remove"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
<?php
$model2 = Vcarcount::find()->all();
//         $titlename2[] = null;
//        $dataamt2[] = null;
//                 

foreach ($model2 as $data2) {
    if ($data2->brand == '0') {
        continue;
    }

    $titlename2[] = $data2->brand;
    $dataamt2[] = (int) $data2->Count;
}
//                  $titlename = ['TOYOTA', 'ISUZU', 'MAZDA','MISUBISHI','FORD','HONDA','CHEVLOLET'];
//                  $dataamt = [1000, 3500, 400,500, 700, 300, 80];
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => ''],
        'xAxis' => [
            // 'title'=>['text'=>'เดือน'],
            'categories' => $titlename2
        ],
        'yAxis' => [
            'title' => ['text' => '']
        ],
        'series' => [
            ['name' => 'ยี่ห้อ', 'data' => $dataamt2],
        // ['name' => 'John', 'data' => [5, 7, 3]]
        ],
        'credits' => ['enabled' => false],
        'chart' => [
            'type' => 'column',
        ],
    ]
]);
?>
                </div><!-- /.box-body -->
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>
<!--    <div class="panel-default">
        <div class="panel-heading">
            <h3>Reports</h3>
        </div>
        <div class="panel-body">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h4 class="box-title">ค้นหาขั้นสูง</h4>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="glyphicon glyphicon-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="glyphicon glyphicon-remove"></i></button>
                  </div>
                </div>
                <div class="box-body chart-responsive">
                dfd
                </div> /.box-body 
              </div> /.box 
              
<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    // 'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        // 'car4_id',
        'brand',
        //'gen',
        'o1',
        'o2',
        'o3',
        'o4',
        // 'o5',
        // 'o6',
        // 'o7',
        // 'o8',
        // 'o9',
        // 'o10',
        // 'o11',
        // 'o12',
        // 'o13',
        // 'o14',
        // 'o15',
        // 'o16',
        // 'o17',
        // 'o18',
        // 'o19',
        // 'o20',
        'year',
        // 'id',
        // 'close',
        // 'open',
        'tabain',
    // 'mile',
    // 'serialbox',
    // 'serialmachine',
    // 'arena',
    // 'datearena',
    // 'detail:ntext',
    // 'pricevat',
    // 'date',
    //  ['class' => 'yii\grid\ActionColumn'],
    ],
]);
?>
        </div>
            
    </div>-->
<p>
<?php //echo Html::a('Create Dashboard', ['create'], ['class' => 'btn btn-success']) ?>
</p>



</div>
    <?php
    $this->registerJs(
            ' $(function(){
        $("#search").hide();
        $("#btnsearch").click(function(){
            $("#search").slideToggle();
        });
      });  '
    );
    ?>