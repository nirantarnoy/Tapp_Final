<?php

namespace common\models;

use Yii;
use yii\behaviors;
use yii\db\Expression;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "car4".
 *
 * @property integer $car4_id
 * @property string $brand
 * @property string $gen
 * @property string $o1
 * @property string $o2
 * @property string $o3
 * @property string $o4
 * @property string $o5
 * @property string $o6
 * @property string $o7
 * @property string $o8
 * @property string $o9
 * @property string $o10
 * @property string $o11
 * @property string $o12
 * @property string $o13
 * @property string $o14
 * @property string $o15
 * @property string $o16
 * @property string $o17
 * @property string $o18
 * @property string $o19
 * @property string $o20
 * @property string $year
 * @property string $id
 * @property string $close
 * @property string $open
 * @property string $tabain
 * @property string $mile
 * @property string $serialbox
 * @property string $serialmachine
 * @property string $arena
 * @property string $datearena
 * @property string $detail
 * @property string $pricevat
 * @property string $date
 */
class Car4 extends \yii\db\ActiveRecord
{
    public $myfile;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car4';
    }

    /**
     * @inheritdoc
     */
    
    public function rules()
    {
        return [
            [['detail'], 'string'],
            [['date'], 'safe'],
            [['brand', 'gen', 'o1', 'o2', 'o3', 'o4', 'o5', 'o6', 'o7', 'o8', 'o9', 'o10', 'o11', 'o12', 'o13', 'o14', 'o15', 'o16', 'o17', 'o18', 'o19', 'o20', 'year', 'id', 'close', 'open', 'tabain', 'mile', 'serialbox', 'serialmachine', 'arena', 'datearena', 'pricevat'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'car4_id' => 'Car4 ID',
            'brand' => 'ยี่ห้อ',
            'gen' => 'รุ่น',
            'o1' => 'O1',
            'o2' => 'O2',
            'o3' => 'O3',
            'o4' => 'O4',
            'o5' => 'O5',
            'o6' => 'O6',
            'o7' => 'O7',
            'o8' => 'O8',
            'o9' => 'O9',
            'o10' => 'O10',
            'o11' => 'O11',
            'o12' => 'O12',
            'o13' => 'O13',
            'o14' => 'O14',
            'o15' => 'O15',
            'o16' => 'O16',
            'o17' => 'O17',
            'o18' => 'O18',
            'o19' => 'O19',
            'o20' => 'O20',
            'year' => 'Year',
            'id' => 'ID',
            'close' => 'Close',
            'open' => 'Open',
            'tabain' => 'Tabain',
            'mile' => 'Mile',
            'serialbox' => 'Serialbox',
            'serialmachine' => 'Serialmachine',
            'arena' => 'Arena',
            'datearena' => 'Datearena',
            'detail' => 'Detail',
            'pricevat' => 'Pricevat',
            'date' => 'Date',
        ];
    }
}
