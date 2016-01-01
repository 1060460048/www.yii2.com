<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Jianli;

/**
 * JianliSearch represents the model behind the search form about `common\models\Jianli`.
 */
class JianliSearch extends Jianli
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'end_at', 'views'], 'integer'],
            [['xingming', 'xingbie', 'nianling', 'xueli', 'xiangguanzhengshu', 'yingpingzhiwei', 'qiwangxinzi', 'gerenjianjie', 'qitayaoqiu', 'lianxidianhua', 'author', 'jobtype'], 'safe'],
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
        $query = Jianli::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'end_at' => $this->end_at,
            'views' => $this->views,
        ]);

        $query->andFilterWhere(['like', 'xingming', $this->xingming])
            ->andFilterWhere(['like', 'xingbie', $this->xingbie])
            ->andFilterWhere(['like', 'nianling', $this->nianling])
            ->andFilterWhere(['like', 'xueli', $this->xueli])
            ->andFilterWhere(['like', 'xiangguanzhengshu', $this->xiangguanzhengshu])
            ->andFilterWhere(['like', 'yingpingzhiwei', $this->yingpingzhiwei])
            ->andFilterWhere(['like', 'qiwangxinzi', $this->qiwangxinzi])
            ->andFilterWhere(['like', 'gerenjianjie', $this->gerenjianjie])
            ->andFilterWhere(['like', 'qitayaoqiu', $this->qitayaoqiu])
            ->andFilterWhere(['like', 'lianxidianhua', $this->lianxidianhua])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'jobtype', $this->jobtype]);

        return $dataProvider;
    }
}
