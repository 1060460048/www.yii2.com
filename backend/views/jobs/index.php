<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JobsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '职位管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobs-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'company_id',
                'value'=>function($model){
                    $rtn = \common\models\Company::findModel($model->id);
                    if($rtn){
                        return $rtn->name;
                    }
                    return "未知";
                }
            ],
            'zhiweiming',
            'gongzuodiqu',
            'zhiweixinzi',
            // 'xueliyaoqiu',
            // 'zhaopinrenshu',
            // 'gongzuoxingzhi',
            // 'xingbieyaoqiu',
            // 'gongzuojingyan',
            // 'jingzhengyoushi',
            // 'zhiweimiaoshu:ntext',
            // 'created_at',
            // 'updated_at',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
