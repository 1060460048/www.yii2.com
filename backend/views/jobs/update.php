<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Jobs */

$this->title = '修改: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '职位管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="jobs-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
