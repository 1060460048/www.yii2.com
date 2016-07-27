<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\GoodsPriceLog */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '价格变动日志', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-price-log-view">

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
            'goods_id',
            'year',
            'month',
            'day',
            'price',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
