<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Dashboard */

$this->title = 'Update Dashboard: ' . ' ' . $model->car4_id;
$this->params['breadcrumbs'][] = ['label' => 'Dashboards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->car4_id, 'url' => ['view', 'id' => $model->car4_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dashboard-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
