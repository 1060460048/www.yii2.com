<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Pinglun */

$this->title = '添加评论';
$this->params['breadcrumbs'][] = ['label' => '评论管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pinglun-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
