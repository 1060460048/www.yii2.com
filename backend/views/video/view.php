<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Video */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '微课管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-view">

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'class',
                'value'=>  \common\models\Labels::getLabel($model->class,"class"),
            ],
            [
                'attribute'=>'course',
                'value'=>  \common\models\Labels::getLabel($model->course,"course"),
            ],
            'title',
            'thumb',
            'keyword',
            'video',
            'content:ntext',
            'author',
            [
                'attribute' => 'status',
                'value' => \common\models\Status::labels($model->status),
            ],
            'views',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
