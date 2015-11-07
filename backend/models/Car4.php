<?php
namespace backend\Models;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

class Car4 extends \common\models\Car4{
    public function behaviors() {
        return[
            'timestamp'=>[
                'class'=>  \yii\behaviors\TimestampBehavior::className(),
                'attributes'=>[
                    ActiveRecord::EVENT_BEFORE_INSERT=>'date',
                    ActiveRecord::EVENT_BEFORE_UPDATE=>'date',
                ],
                'value'=>new Expression('NOW()'),
            ]
            
        ];
    }
}

