<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Singlepage */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '单页管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="singlepage-view">

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
            'title',
            'content:ntext',
            'keywords',
            'description',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
