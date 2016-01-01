<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ConfigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '配置管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="config-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'sitename',
            'description',
            'keywords',
            'address',
            // 'phone',
            // 'email:email',
            // 'beianhao',
            // 'tongji:ntext',
            // 'n1',
            // 'n2',
            // 'n3',
            // 'n4',
            // 'n5',
            // 'n6',
            // 'n7',
            // 'n8',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
