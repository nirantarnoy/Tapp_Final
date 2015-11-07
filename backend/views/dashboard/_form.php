<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Dashboard */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dashboard-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'o1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'o2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'o3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'o4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'o5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'o6')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'o7')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'o8')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'o9')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'o10')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'o11')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'o12')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'o13')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'o14')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'o15')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'o16')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'o17')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'o18')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'o19')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'o20')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'close')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'open')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tabain')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'serialbox')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'serialmachine')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'arena')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datearena')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pricevat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
