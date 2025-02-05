<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MissDetail;

/**
 * MissDetailSearch represents the model behind the search form of `app\models\MissDetail`.
 */
class MissDetailSearch extends MissDetail
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_miss', 'category', 'count'], 'integer'],
            [['icon', 'descritption', 'comment', 'name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = MissDetail::find();

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
            'id_miss' => $this->id_miss,
            'category' => $this->category,
            'count' => $this->count,
        ]);

        $query->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'descritption', $this->descritption])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
