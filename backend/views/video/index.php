<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Status;
/* @var $this yii\web\View */
/* @var $searchModel common\models\VideoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '微课管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
        <input type="button" class="btn btn-info" value="批量删除" id="MyButton" >
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\CheckboxColumn'],
            'id',
            [
                'attribute'=>'class',
                'value'=>function ($model) {
                    return \common\models\Labels::getLabel($model->class,"class");
                },
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'class',
                    Yii::$app->params['class'],
                    ['class' => 'form-control', 'prompt' => Yii::t('app', 'Please Filter')]
                ),
            ],
            [
                'attribute'=>'course',
                'value'=>function ($model) {
                    return \common\models\Labels::getLabel($model->course,"course");
                },
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'course',
                    Yii::$app->params['course'],
                    ['class' => 'form-control', 'prompt' => Yii::t('app', 'Please Filter')]
                ),
            ],
            'title',
            'thumb',
            'keyword',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function ($model) {
                    if ($model->status === Status::STATUS_ACTIVE) {
                        $class = 'label-success';
                    } elseif ($model->status === Status::STATUS_DELETED) {
                        $class = 'label-warning';
                    } else {
                        $class = 'label-danger';
                    }

                    return '<span class="label ' . $class . '">' . Status::labels($model->status) . '</span>';
                },
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'status',
                    Status::labels(),
                    ['class' => 'form-control', 'prompt' => Yii::t('app', 'PROMPT_STATUS')]
                )
            ],
            //'content:ntext',
            // 'author',
           
            // 'views',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
<?php
$url = Yii::$app->urlManager->createUrl(['video/delete-multiple']);
$js = <<< JS
$(document).ready(function(){
    $('#MyButton').click(function(){
        var HotId = $('#w1').yiiGridView('getSelectedRows');
        alert(HotId);
        //return false;
        $.ajax({
            type: 'POST',
            url : '{$url}',
            data : {pk: HotId},
            success : function() {
                $.pjax.reload({container:'#w1'});
              //$(this).closest('tr').remove(); //or whatever html you use for displaying rows
            }
        });

    });
});
JS;
$this->registerJs($js, \yii\web\View::POS_READY);

?>