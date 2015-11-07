<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Car4 */

$this->title = 'แก้ไขข้อมูล: ' . ' ' . $model->car4_id;
$this->params['breadcrumbs'][] = ['label' => 'Car4s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->car4_id, 'url' => ['view', 'id' => $model->car4_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="car4-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
