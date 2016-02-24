<?php

namespace backend\components;

use Yii;

class Controller extends \yii\web\Controller
{
	public function beforeAction($action) {
        Yii::$app->controller->enableCsrfValidation = false;
        if(parent::beforeAction($action)){
            return true;
        }
    }
}