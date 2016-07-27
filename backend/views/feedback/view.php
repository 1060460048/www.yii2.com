<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Feedback */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '留言管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-view">

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
            //'type',
            'name',
            'phone',
            'content:ntext',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
