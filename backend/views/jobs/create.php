<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Jobs */

$this->title = '添加职位';
$this->params['breadcrumbs'][] = ['label' => '职位管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobs-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
