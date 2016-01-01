<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Company */

$this->title = '修改: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '招聘企业管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="company-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
