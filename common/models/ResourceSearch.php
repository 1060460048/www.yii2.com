<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Resource;

/**
 * ResourceSearch represents the model behind the search form about `common\models\Resource`.
 */
class ResourceSearch extends Resource
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'class', 'course', 'status', 'views', 'downtime', 'star', 'pinglunnum', 'created_at', 'updated_at'], 'integer'],
            [['title', 'thumb', 'keyword', 'content', 'author','type'], 'safe'],
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
        $query = Resource::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]],
            'pagination' => [
                'pageSize' => 20,
            ],

        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'type' => $this->type,
            'class' => $this->class,
            'course' => $this->course,
            'status' => $this->status,
            'views' => $this->views,
            'downtime' => $this->downtime,
            'star' => $this->star,
            'pinglunnum' => $this->pinglunnum,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'thumb', $this->thumb])
            ->andFilterWhere(['like', 'keyword', $this->keyword])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'author', $this->author]);

        return $dataProvider;
    }
}
