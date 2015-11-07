<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "v_car".
 *
 * @property string $brand
 * @property string $gen
 * @property string $o1
 * @property string $o2
 * @property string $o3
 * @property string $year
 * @property string $id
 * @property string $close
 * @property string $open
 * @property string $tabain
 * @property string $serialbox
 * @property integer $year1
 * @property integer $month
 */
class VCar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year1', 'month'], 'integer'],
            [['brand', 'gen', 'o1', 'o2', 'o3', 'year', 'id', 'close', 'open', 'tabain', 'serialbox'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'brand' => 'Brand',
            'gen' => 'Gen',
            'o1' => 'O1',
            'o2' => 'O2',
            'o3' => 'O3',
            'year' => 'Year',
            'id' => 'ID',
            'close' => 'Close',
            'open' => 'Open',
            'tabain' => 'Tabain',
            'serialbox' => 'Serialbox',
            'year1' => 'Year1',
            'month' => 'Month',
        ];
    }
}
