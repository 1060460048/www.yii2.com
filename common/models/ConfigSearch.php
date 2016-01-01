<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Config;

/**
 * ConfigSearch represents the model behind the search form about `common\models\Config`.
 */
class ConfigSearch extends Config
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['sitename', 'description', 'keywords', 'address', 'phone', 'email', 'beianhao', 'tongji', 'n1', 'n2', 'n3', 'n4', 'n5', 'n6', 'n7', 'n8'], 'safe'],
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
        $query = Config::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'sitename', $this->sitename])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'beianhao', $this->beianhao])
            ->andFilterWhere(['like', 'tongji', $this->tongji])
            ->andFilterWhere(['like', 'n1', $this->n1])
            ->andFilterWhere(['like', 'n2', $this->n2])
            ->andFilterWhere(['like', 'n3', $this->n3])
            ->andFilterWhere(['like', 'n4', $this->n4])
            ->andFilterWhere(['like', 'n5', $this->n5])
            ->andFilterWhere(['like', 'n6', $this->n6])
            ->andFilterWhere(['like', 'n7', $this->n7])
            ->andFilterWhere(['like', 'n8', $this->n8]);

        return $dataProvider;
    }
}
