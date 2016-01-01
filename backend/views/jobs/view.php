<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Jobs */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '职位管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobs-view">

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
            'company_id',
            'zhiweiming',
            'gongzuodiqu',
            'zhiweixinzi',
            'xueliyaoqiu',
            'zhaopinrenshu',
            'gongzuoxingzhi',
            'xingbieyaoqiu',
            'gongzuojingyan',
            'jingzhengyoushi',
            'zhiweimiaoshu:ntext',
            'created_at',
            'updated_at',
            'status',
        ],
    ]) ?>

</div>
