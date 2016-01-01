<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Jianli */

$this->title = '新增简历';
$this->params['breadcrumbs'][] = ['label' => '简历管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jianli-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
