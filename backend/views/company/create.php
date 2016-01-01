<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Company */

$this->title = '添加招聘企业';
$this->params['breadcrumbs'][] = ['label' => '招聘企业管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
