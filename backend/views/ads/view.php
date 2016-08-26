<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Ads */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '广告管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ads-view">

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'place',
                'value'=>$model->getPlace($model->place),
            ],
            [
                'attribute'=>'thumb',
                'format'=>'html',
                'value'=>'<img src="'.$model->thumb.'" />',
            ],
            'thumb',
            'title',
            //'intro:ntext',
            'url:url',
            //'ord',
            'start_time:datetime',
            'end_time:datetime',
            'updated_at:datetime',
            'created_at:datetime',
        ],
    ]) ?>

</div>
