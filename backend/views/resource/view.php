<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Resource */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '学习资料管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resource-view">

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
                'attribute'=>'type',
                'value'=>  \common\models\Labels::getLabel($model->type,"resource"),
            ],
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
            'content:ntext',
            'author',
            [
                'attribute' => 'status',
                'value' => \common\models\Status::labels($model->status),
            ],
            'views',
            'downtime:datetime',
            'star',
            'pinglunnum',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
