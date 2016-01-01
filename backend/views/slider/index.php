<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '轮播图管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-index">

   
    <p>
        <?= Html::a('新增轮播图', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'place',
            [
                'attribute' => 'place',
                'value'=>function ($model) {
                    return $model->getPlace($model->place);
                },
                'filter' => Html::activeDropDownList(
                    $model,
                    'place',
                     $model::places(),
                    //ArrayHelper::map(Category::get(0, Category::find()->asArray()->all()), 'id', 'label'),
                    ['class' => 'form-control', 'prompt' => Yii::t('app', 'Please Filter')]
                ),
            ],
            'thumb',
            'intro:ntext',
            'url:url',
             'ord',
            // 'updated_at',
            // 'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
