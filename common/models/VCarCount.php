<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "v_car_count".
 *
 * @property string $Count
 * @property string $brand
 */
class VCarCount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_car_count';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Count'], 'integer'],
            [['brand'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Count' => 'Count',
            'brand' => 'Brand',
        ];
    }
}
