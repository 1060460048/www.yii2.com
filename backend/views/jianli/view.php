<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Jianli */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '简历管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jianli-view">

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
            'xingming',
            'xingbie',
            'nianling',
            'xueli',
            'xiangguanzhengshu',
            'yingpingzhiwei',
            'qiwangxinzi',
            'gerenjianjie',
            'qitayaoqiu',
            'lianxidianhua',
            'created_at',
            'updated_at',
            'end_at',
            'views',
            'author',
//            'jobtype',
        ],
    ]) ?>

</div>
