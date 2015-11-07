<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "v_car_close".
 *
 * @property integer $car4_id
 * @property string $brand
 * @property string $gen
 * @property string $o1
 * @property string $o2
 * @property string $tabain
 * @property string $close
 * @property string $date
 * @property integer $year
 * @property integer $month
 */
class VCarClose extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_car_close';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car4_id', 'year', 'month'], 'integer'],
            [['date'], 'safe'],
            [['brand', 'gen', 'o1', 'o2', 'tabain', 'close'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'car4_id' => 'Car4 ID',
            'brand' => 'Brand',
            'gen' => 'Gen',
            'o1' => 'O1',
            'o2' => 'O2',
            'tabain' => 'Tabain',
            'close' => 'Close',
            'date' => 'Date',
            'year' => 'Year',
            'month' => 'Month',
        ];
    }
}
