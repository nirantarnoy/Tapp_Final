<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
use kartik\file\FileInput;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $model backend\models\Car4 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="car4-form">
    
    

    <?php $form = ActiveForm::begin(['id' => 'form-upload', 'options' => ['enctype' => 'multipart/form-data']]); ?>
    <?php    Modal::begin([
         //'header' => '',
                'id' => 'modal',
                // 'data-backdrop'=>static,
                'size' => 'modal-sm',
                'options' => ['data-backdrop' => 'false',
                    ],
                 'closeButton'=>['label'=>''],
               // 'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>',
    ]);
    echo  "<div id='showmodal' style='text-align: center;'><img src='../../uploads/loading_spinner.gif' width=100'></div>";
    ?>
   
    <?php    Modal::end()?>
   
   
<?php if(!$model->isNewRecord):?>
    <?= $form->field($model, 'brand')->textInput()?>
   <?= $form->field($model, 'gen')->textInput()?>
   <?= $form->field($model, 'o1')->textInput()?>
   <?= $form->field($model, 'o2')->textInput()?>
   <?= $form->field($model, 'o3')->textInput()?>
   <?= $form->field($model, 'o4')->textInput()?>
  <?= $form->field($model, 'o5')->textInput()?>
  <?= $form->field($model, 'o6')->textInput()?>
    <?php else:?>
     <div class="form-group">
                 <?php
            echo '<label class="control-label">เพิ่มไฟล์</label>';
            echo FileInput::widget([
                'model' => $model,
                'attribute' => 'myfile[]',
                'id'=>'upfile',
               // 'attribute' => 'myfile',
                'options' => ['multiple' => true,'accept' => '.xlsx','style'=>'width: 300px'],
                 'pluginOptions' => [
                 'showUpload'=>false,
                 'maxFileCount'=>30,
                 ], 
            ]);
            ?>
            </div>
    <?php endif;?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึกข้อมูล' : 'แก้ไขข้อมูล', ['id'=>'btnsub','class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php $this->registerJs(
        '$(function(){
            
         $(":submit").click(function(e){
         var xval = $("#car4-myfile").val();
              if(xval == "" || xval == null){
                alert("กรุณาเลือกไฟล์ที่ต้องการอัพโหลดก่อนครับ");
                e.preventDefault();
              }else{
              
            var Url = "' . \yii::$app->getUrlManager()->createUrl('car4/create') . '";
            $.ajax({
            type:"post",
            dataType: "html",
            url: Url,
            data:{pk: 0},
            success: function(data){
                   //  alert("ss"); 
                     $("#modal").modal("show").find("#showmodal").load($(this).attr("value"));
                }
                });
         
   
               
              }
         });
        });'
);?>