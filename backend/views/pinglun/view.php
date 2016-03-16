<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pinglun */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '评论管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pinglun-view">

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
            'star',
            'content:ntext',
            [
                'attribute'=>'type',
                'value'=>  \common\models\Labels::getLabel($model->type,"type"),
            ],
            'rid',
            [
                'attribute'=>'created_by',
                'value' => isset($model->user)&&$model->user?$model->user->username:"x",
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
