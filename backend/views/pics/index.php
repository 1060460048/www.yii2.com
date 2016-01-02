<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PicsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '图片';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pics-index">

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
                'attribute'=>'type',
                'value'=>function($model){
                    return $model->getTypeName($model->type);
                },
                //'filter'=>['s','d'],
                //'filter'=>function($model){return $model->types();}
                'filter'=>function($model){$model->types();},
            ],
            'name',
            'intro',
            'duty',
            // 'thumb',
            // 'content:ntext',
            // 'status',
            // 'views',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
