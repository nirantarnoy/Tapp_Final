<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Car4;

/**
 * Car4Search represents the model behind the search form about `backend\models\Car4`.
 */
class Car4Search extends Car4
{
    public $globalSearch;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car4_id'], 'integer'],
            [['brand', 'gen', 'o1', 'o2', 'o3', 'o4', 'o5', 'o6', 'o7', 'o8', 'o9', 'o10', 'o11', 'o12', 'o13', 'o14', 'o15', 'o16', 'o17', 'o18', 'o19', 'o20', 'year', 'id', 'close', 'open', 'tabain', 'mile', 'serialbox', 'serialmachine', 'arena', 'datearena', 'detail', 'pricevat', 'date'], 'safe'],
        [['globalSearch'],'string'],
            ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Car4::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
//        $query->andFilterWhere([
//            'car4_id' => $this->car4_id,
//            'date' => $this->date,
//        ]);

        $query->orFilterWhere(['like', 'brand', $this->globalSearch])
            ->orFilterWhere(['like', 'gen', $this->globalSearch])
            ->orFilterWhere(['like', 'o1', $this->globalSearch])
            ->orFilterWhere(['like', 'o2', $this->globalSearch])
            ->orFilterWhere(['like', 'o3', $this->globalSearch])
            ->orFilterWhere(['like', 'o4', $this->globalSearch])
            ->orFilterWhere(['like', 'o5', $this->globalSearch])
            ->orFilterWhere(['like', 'o6', $this->globalSearch])
            ->orFilterWhere(['like', 'o7', $this->globalSearch])
            ->orFilterWhere(['like', 'o8', $this->globalSearch])
            ->orFilterWhere(['like', 'o9', $this->globalSearch])
            ->orFilterWhere(['like', 'o10', $this->globalSearch])
            ->orFilterWhere(['like', 'o11', $this->globalSearch])
            ->orFilterWhere(['like', 'o12', $this->globalSearch])
            ->orFilterWhere(['like', 'o13', $this->globalSearch])
            ->orFilterWhere(['like', 'o14', $this->globalSearch])
            ->orFilterWhere(['like', 'o15', $this->globalSearch])
            ->orFilterWhere(['like', 'o16', $this->globalSearch])
            ->orFilterWhere(['like', 'o17', $this->globalSearch])
            ->orFilterWhere(['like', 'o18', $this->globalSearch])
            ->orFilterWhere(['like', 'o19', $this->globalSearch])
            ->orFilterWhere(['like', 'o20', $this->globalSearch])
            ->orFilterWhere(['like', 'year', $this->globalSearch])
            ->orFilterWhere(['like', 'id', $this->globalSearch])
            ->orFilterWhere(['like', 'close', $this->globalSearch])
            ->orFilterWhere(['like', 'open', $this->globalSearch])
            ->orFilterWhere(['like', 'tabain', $this->globalSearch])
            ->orFilterWhere(['like', 'mile', $this->globalSearch])
            ->orFilterWhere(['like', 'serialbox', $this->globalSearch])
            ->orFilterWhere(['like', 'serialmachine', $this->globalSearch])
            ->orFilterWhere(['like', 'arena', $this->globalSearch])
            ->orFilterWhere(['like', 'datearena', $this->globalSearch])
            ->orFilterWhere(['like', 'detail', $this->globalSearch])
            ->orFilterWhere(['like', 'pricevat', $this->globalSearch]);

        return $dataProvider;
    }
}
