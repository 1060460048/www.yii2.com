<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AdsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '广告管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ads-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加广告', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'place',
                'value'=>  function ($model) {
                    return common\models\Ads::getPlace($model->place);
                },
            ],
            'place',
            'thumb',
            'title',
            'intro:ntext',
            // 'url:url',
            // 'ord',
            // 'updated_at',
            // 'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
