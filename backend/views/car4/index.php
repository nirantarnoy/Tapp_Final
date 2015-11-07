<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\web\Session;

$session = new Session();
$session->open();

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Car4Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายชื่อรถยนต์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car4-index">

    <?php if($session->getFlash('msg')):?>
    <div class="alert alert-success alert-dismissable" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?=$session->getFlash('msg')?>
    </div>
    <?php endif;?>
    <h3><?= Html::encode($this->title) ?></h3>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo Html::a(' + ', ['create'], ['class' => 'btn btn-success
               $perpage = [10,20,30,40,50,60,70,80,90,100];
         ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
       // 'filterSelector' => 'select[name="per-page"]',
        'id' => 'gridId',
        'panel'=>[
             'type'=>GridView::TYPE_SUCCESS,
            'heading'=>$this->render('_search', ['model' => $searchModel]),
        ],
        'toolbar'=>[ 
             ['content'=>Html::dropDownList('Per page',null,$perpage,['prompt'=>$perpagex,'class'=>'form-control','id'=>'perpage',])],
           
              ['content'=>Html::a('Add', ['create'], ['class' => 'btn btn-success'])],
              ['content' => Html::button('Delete', ['value' => \yii\helpers\Url::to(['/jobclose/niran']), 'class' => 'btn btn-danger', 'id' => 'btndelete'])],
               '{toggleData}','{export}',
             
                         
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                                'class' => 'yii\grid\CheckboxColumn',
                                'checkboxOptions' => function($model) {
                                    return ['value' => \yii\helpers\ArrayHelper::getValue($model, 'recid'),
                                        'checked' => false,
                                        'onClick' => ''
                                        . 'if(this.checked){'
                                        . 'this.parentElement.parentElement.style.backgroundColor="#CCFFCC";'
                                        . '}'
                                        . 'else{'
                                        . 'this.parentElement.parentElement.style.backgroundColor="white";'
                                        . '}'
                                    ];
                                },
                                    ],
           // 'car4_id',
            'brand',
            'gen',
            'o1',
            'o2',
             'o3',
             'o4',
             'o5',
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
            // 'year',
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

           // ['class' => 'yii\grid\ActionColumn'],
            [

                        'header' => 'Action',
                        'headerOptions' => ['style' => 'width: 160px;text-align:center;', 'class' => 'activity-view-link',],
                        'class' => 'yii\grid\ActionColumn',
                        'contentOptions' => ['style' => 'text-align: center'],
                        'buttons' => [
                            'view' => function($url, $data, $index) {
                                $options = [
                                    'title' => Yii::t('yii', 'View'),
                                    'aria-label' => Yii::t('yii', 'View'),
                                    'data-pjax' => '0',
                                ];
                                return Html::a(
                                                '<span class="glyphicon glyphicon-eye-open btn btn-default"></span>', $url, $options);
                            },
                                    'update' => function($url, $data, $index) {
                                $options = array_merge([
                                    'title' => Yii::t('yii', 'Update'),
                                    'aria-label' => Yii::t('yii', 'Update'),
                                    'data-pjax' => '0',
                                    'id' => 'modaledit',
                                ]);
                                return Html::a(
                                                '<span class="glyphicon glyphicon-pencil btn btn-default"></span>', $url, [
                                            'id' => 'activity-view-link',
                                            //'data-toggle' => 'modal',
                                            // 'data-target' => '#modal',
                                            'data-id' => $index,
                                            'data-pjax' => '0'
                                ]);
                            },
                                    'delete' => function($url, $data, $index) {
                                $options = array_merge([
                                    'title' => Yii::t('yii', 'Delete'),
                                    'aria-label' => Yii::t('yii', 'Delete'),
                                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                    'data-method' => 'post',
                                    'data-pjax' => '0',
                                ]);
                                return Html::a('<span class="glyphicon glyphicon-trash btn btn-default"></span>', $url, $options);
                            }
                                ]
                            ],
        ],
    ]); ?>

</div>
<?php $this->registerJs(
        '$(function(){
            alert
             $("#btndelete").click(function(){
          
                var recid = $("#gridId").yiiGridView("getSelectedRows");
                if(recid.length < 1){
                    alert("คุณยังไม่ได้เลือกรายการที่ต้องการลบ");
                    return;
                }
                var Url = "' . \yii::$app->getUrlManager()->createUrl('car4/multidelete') .  '";
                    if(confirm("ต้องการลบรายการนี้ใช่หรือไม่")){
                        $.ajax({
                        type:"post",
                        dataType: "html",
                        url: Url,
                        data:{pk: recid},
                        success: function(data){
                       
                            },
                        error: function(data)
                        {
                           // alert("fail");
                        }
                        });
                }
            });
            $("#perpage").change(function(){
                var pages = $("#perpage :selected").text();
//                $.fn.YiiGridView.update("gridId",[data:[pageSize:pages]]);
                var Url = "' . \yii::$app->getUrlManager()->createUrl('car4/showbyper') .  '";
                  //  alert(Url);
                $.ajax({
                        type:"post",
                        dataType: "html",
                        url: Url,
                        data:{pk: pages},
                        success: function(data){
                          //alert(data);
                           //location.reload();
                            },
                        error: function(data)
                        {
                          //  alert("fail");
                        }
                });
                
            });
            
           
        });'
);?>
