<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-23 13:35:57
 */

/**
 * Common Status Class
Usage:
model.php
private $_status;
public function getStatus()
{
	if ($this->_status === null) {
		$this->_status = new Status($this->status);
	}
	return $this->_status;
}
 
index.php 
[
	'attribute' => 'status',
	'format' => 'html',
	'value' => function ($model) {
			if ($model->status === Status::STATUS_ACTIVE) {
				$class = 'label-success';
			} elseif ($model->status === Status::STATUS_INACTIVE) {
				$class = 'label-warning';
			} else {
				$class = 'label-danger';
			}

			return '<span class="label ' . $class . '">' . $model->getStatus()->label . '</span>';
		},
	'filter' => Html::activeDropDownList(
			$searchModel,
			'status',
			Status::labels(),
			['class' => 'form-control', 'prompt' => Yii::t('app', 'Please Select')]
		)
],

_form.php
<?= $form->field($model, 'status')->dropDownList(\common\models\Status::labels()) ?>

view.php
[
	'attribute' => 'status',
	'value' => $model->getStatus()->label,
],

 */

namespace common\models;

use Yii;

class Labels
{
    public static function getLabel($id = 0,$name)
    {
        $data = Yii::$app->params[$name];

        if (isset($data[$id])) {
            return $data[$id];
        } else {
            return "不存在";
        }
    }

    

}


