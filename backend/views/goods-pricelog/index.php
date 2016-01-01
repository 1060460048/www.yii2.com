<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GoodsPriceLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '价格变动日志';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-price-log-index">

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
                'attribute'=>'goods_id',
                'value'=>function($model){
                    $goods = \common\models\Goods::findModel($model->id);
                    if($goods){
                        return $goods->name;
                    }else{
                        return "";
                    }
                },
            ], 
//            'year',
//            'month',
//            'day',
             'price',
             'created_at:datetime',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
