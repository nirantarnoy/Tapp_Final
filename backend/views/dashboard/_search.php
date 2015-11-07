<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DashboardSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dashboard-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php //echo  $form->field($model, 'car4_id') ?>
    <div class="row">
        <div class="col-lg-6">
<!--             <label class="control-label col-sm-3" for="inputSuccess3">สนาม</label>
    <div class="col-sm-9">
    <?php //echo $form->field($model, 'serialbox')->label(false) ?>
       
    </div>-->
          
      <label class="control-label col-sm-3" for="inputSuccess3">ยี่ห้อ</label>
    <div class="col-sm-9">
    <?= $form->field($model, 'brand')->label(false) ?>
       
    </div>
       <label class="control-label col-sm-3" for="inputSuccess3">รุ่น</label>
    <div class="col-sm-9">
    <?= $form->field($model, 'o1')->label(false) ?>
       
    </div>
        </div>
        <div class="col-lg-6">
             <label class="control-label col-sm-3" for="inputSuccess3">ทะเบียน</label>
    <div class="col-sm-9">
    <?php  echo $form->field($model, 'tabain')->label(false) ?>
       
    </div>
             
      
        </div>
    </div>

    

    <?php //echo $form->field($model, 'gen') ?>

    <?php //echo $form->field($model, 'o1') ?>

    <?php //echo $form->field($model, 'o2') ?>

    <?php // echo $form->field($model, 'o3') ?>

    <?php // echo $form->field($model, 'o4') ?>

    <?php // echo $form->field($model, 'o5') ?>

    <?php // echo $form->field($model, 'o6') ?>

    <?php // echo $form->field($model, 'o7') ?>

    <?php // echo $form->field($model, 'o8') ?>

    <?php // echo $form->field($model, 'o9') ?>

    <?php // echo $form->field($model, 'o10') ?>

    <?php // echo $form->field($model, 'o11') ?>

    <?php // echo $form->field($model, 'o12') ?>

    <?php // echo $form->field($model, 'o13') ?>

    <?php // echo $form->field($model, 'o14') ?>

    <?php // echo $form->field($model, 'o15') ?>

    <?php // echo $form->field($model, 'o16') ?>

    <?php // echo $form->field($model, 'o17') ?>

    <?php // echo $form->field($model, 'o18') ?>

    <?php // echo $form->field($model, 'o19') ?>

    <?php // echo $form->field($model, 'o20') ?>

    <?php // echo $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'id') ?>

    <?php // echo $form->field($model, 'close') ?>

    <?php // echo $form->field($model, 'open') ?>

    <?php // echo $form->field($model, 'tabain') ?>

    <?php // echo $form->field($model, 'mile') ?>

    <?php // echo $form->field($model, 'serialbox') ?>

    <?php // echo $form->field($model, 'serialmachine') ?>

    <?php // echo $form->field($model, 'arena') ?>

    <?php // echo $form->field($model, 'datearena') ?>

    <?php // echo $form->field($model, 'detail') ?>

    <?php // echo $form->field($model, 'pricevat') ?>

    <?php // echo $form->field($model, 'date') ?>

    <div class="form-group pull-right">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php //echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
