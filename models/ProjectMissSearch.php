<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProjectMiss;

/**
 * ProjectMissSearch represents the model behind the search form of `app\models\ProjectMiss`.
 */
class ProjectMissSearch extends ProjectMiss
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_miss', 'project_id', 'id'], 'integer'],
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
        $query = ProjectMiss::find();

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
            'project_id' => $this->project_id,
            'id' => $this->id,
        ]);

        return $dataProvider;
    }
}
