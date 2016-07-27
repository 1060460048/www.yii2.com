<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Album */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '师生风采', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-view">

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
            'intro',
            'author',
            'views',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
