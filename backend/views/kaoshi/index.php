<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\KaoshiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '考试管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kaoshi-index">

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
            'title',
            'baomingshijian',
            'jiezhishijian',
            'kaoshishijian',
            [
                'attribute'=>'is_reminder',
                'value'=>function($model){
                    return $model->is_reminder?"是":"否";
                }
            ],
            'created_at:date',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
