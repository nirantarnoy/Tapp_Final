<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Dashboard;

/**
 * DashboardSearch represents the model behind the search form about `backend\models\Dashboard`.
 */
class DashboardSearch extends Dashboard
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car4_id'], 'integer'],
            [['brand', 'gen', 'o1', 'o2', 'o3', 'o4', 'o5', 'o6', 'o7', 'o8', 'o9', 'o10', 'o11', 'o12', 'o13', 'o14', 'o15', 'o16', 'o17', 'o18', 'o19', 'o20', 'year', 'id', 'close', 'open', 'tabain', 'mile', 'serialbox', 'serialmachine', 'arena', 'datearena', 'detail', 'pricevat', 'date'], 'safe'],
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
        $query = Dashboard::find();

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
        $query->andFilterWhere([
            'car4_id' => $this->car4_id,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'gen', $this->gen])
            ->andFilterWhere(['like', 'o1', $this->o1])
            ->andFilterWhere(['like', 'o2', $this->o2])
            ->andFilterWhere(['like', 'o3', $this->o3])
            ->andFilterWhere(['like', 'o4', $this->o4])
            ->andFilterWhere(['like', 'o5', $this->o5])
            ->andFilterWhere(['like', 'o6', $this->o6])
            ->andFilterWhere(['like', 'o7', $this->o7])
            ->andFilterWhere(['like', 'o8', $this->o8])
            ->andFilterWhere(['like', 'o9', $this->o9])
            ->andFilterWhere(['like', 'o10', $this->o10])
            ->andFilterWhere(['like', 'o11', $this->o11])
            ->andFilterWhere(['like', 'o12', $this->o12])
            ->andFilterWhere(['like', 'o13', $this->o13])
            ->andFilterWhere(['like', 'o14', $this->o14])
            ->andFilterWhere(['like', 'o15', $this->o15])
            ->andFilterWhere(['like', 'o16', $this->o16])
            ->andFilterWhere(['like', 'o17', $this->o17])
            ->andFilterWhere(['like', 'o18', $this->o18])
            ->andFilterWhere(['like', 'o19', $this->o19])
            ->andFilterWhere(['like', 'o20', $this->o20])
            ->andFilterWhere(['like', 'year', $this->year])
            ->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'close', $this->close])
            ->andFilterWhere(['like', 'open', $this->open])
            ->andFilterWhere(['like', 'tabain', $this->tabain])
            ->andFilterWhere(['like', 'mile', $this->mile])
            ->andFilterWhere(['like', 'serialbox', $this->serialbox])
            ->andFilterWhere(['like', 'serialmachine', $this->serialmachine])
            ->andFilterWhere(['like', 'arena', $this->arena])
            ->andFilterWhere(['like', 'datearena', $this->datearena])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'pricevat', $this->pricevat]);

        return $dataProvider;
    }
}
