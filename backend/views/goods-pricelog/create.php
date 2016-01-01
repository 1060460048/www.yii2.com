<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GoodsPriceLog */

$this->title = '新增';
$this->params['breadcrumbs'][] = ['label' => '价格变动日志', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-price-log-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
