<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Resource */

$this->title = '修改: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '学习资料管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="resource-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
