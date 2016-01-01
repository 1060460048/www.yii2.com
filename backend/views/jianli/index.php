<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JianliSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '简历管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jianli-index">

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
            'xingming',
            'xingbie',
            'nianling',
            'xueli',
            // 'xiangguanzhengshu',
             'yingpingzhiwei',
            // 'qiwangxinzi',
            // 'gerenjianjie',
            // 'qitayaoqiu',
            // 'lianxidianhua',
            // 'created_at',
            // 'updated_at',
            // 'end_at',
            // 'views',
            // 'author',
            // 'jobtype',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
