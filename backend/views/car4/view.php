<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Car4 */

$this->title = $model->car4_id;
$this->params['breadcrumbs'][] = ['label' => 'Car4s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car4-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->car4_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->car4_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'car4_id',
            'brand',
            'gen',
            'o1',
            'o2',
            'o3',
            'o4',
            'o5',
            'o6',
            'o7',
            'o8',
            'o9',
            'o10',
            'o11',
            'o12',
            'o13',
            'o14',
            'o15',
            'o16',
            'o17',
            'o18',
            'o19',
            'o20',
            'year',
            'id',
            'close',
            'open',
            'tabain',
            'mile',
            'serialbox',
            'serialmachine',
            'arena',
            'datearena',
            'detail:ntext',
            'pricevat',
            'date',
        ],
    ]) ?>

</div>
