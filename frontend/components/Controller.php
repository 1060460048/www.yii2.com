<?php

namespace frontend\components;

use Yii;
use common\models\Config;
class Controller extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            //读取站点配置
            $config = Config::find(['id' => 1])->asArray()->one();
            if($config){
                $this->view->params['siteconfig'] = $config;
            }else{
                die('site config is error');
            }
            
            if (!Yii::$app->session->isActive)
                Yii::$app->session->open();
            
            if(Yii::$app->session->hasFlash("key")){
                $xxxaaa = Yii::$app->session->getFlash("key");
                if($xxxaaa){
                    echo "<script>alert('".$xxxaaa."');</script>";
                }
                unset($xxxaaa);
            }
            
            return true;
        } else {
            return false;
        }
    }

}