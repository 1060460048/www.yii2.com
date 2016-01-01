<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Jobs;

/**
 * JobsSearch represents the model behind the search form about `common\models\Jobs`.
 */
class JobsSearch extends Jobs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'company_id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['zhiweiming', 'gongzuodiqu', 'zhiweixinzi', 'xueliyaoqiu', 'zhaopinrenshu', 'gongzuoxingzhi', 'xingbieyaoqiu', 'gongzuojingyan', 'jingzhengyoushi', 'zhiweimiaoshu'], 'safe'],
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
        $query = Jobs::find();

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
            'company_id' => $this->company_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'zhiweiming', $this->zhiweiming])
            ->andFilterWhere(['like', 'gongzuodiqu', $this->gongzuodiqu])
            ->andFilterWhere(['like', 'zhiweixinzi', $this->zhiweixinzi])
            ->andFilterWhere(['like', 'xueliyaoqiu', $this->xueliyaoqiu])
            ->andFilterWhere(['like', 'zhaopinrenshu', $this->zhaopinrenshu])
            ->andFilterWhere(['like', 'gongzuoxingzhi', $this->gongzuoxingzhi])
            ->andFilterWhere(['like', 'xingbieyaoqiu', $this->xingbieyaoqiu])
            ->andFilterWhere(['like', 'gongzuojingyan', $this->gongzuojingyan])
            ->andFilterWhere(['like', 'jingzhengyoushi', $this->jingzhengyoushi])
            ->andFilterWhere(['like', 'zhiweimiaoshu', $this->zhiweimiaoshu]);

        return $dataProvider;
    }
}
