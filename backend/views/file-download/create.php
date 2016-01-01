<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FileDownload */

$this->title = '文件下载';
$this->params['breadcrumbs'][] = ['label' => '下载管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-download-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
