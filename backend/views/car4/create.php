<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Car4 */

$this->title = 'Upload ข้อมูลรถยนต์';
$this->params['breadcrumbs'][] = ['label' => 'Car4s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car4-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
