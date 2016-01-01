<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Jianli */

$this->title = '修改: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '简历管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="jianli-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
