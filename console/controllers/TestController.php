<?php
namespace console\controllers;
/*
 * @author Lmy
 * QQ:6232967
 * Create at 2016-2-20 15:58:05
 */
use yii;
use yii\swiftmailer;
class TestController extends \yii\console\Controller
{
   
    public function actionIndex() {
        $url = "http://task.zbj.com/t-wzkf/h1s5t5a3601.html";// 本地网站建设
        $file = "./record.txt";
        
        //获取 猪八戒页面 当前 任务数量
        $content = file_get_contents($url);
        $numCurrent = substr_count($content, "list-task-reward");
        
        //获取文档里记录的之前的 任务数量
        $str = json_decode(file_get_contents($file));
        $numOld = isset($str->currentNum)?$str->currentNum:"0";
        
        if($numOld == $numCurrent){
            echo "no new records!\n";
            $this->sendMail();
        }else{
            $this->sendMail();
            echo "records show\n";
        }
        
        $handle = fopen($file, "w+");
        fwrite($handle, json_encode(['currentNum'=>$numCurrent]));
        fclose($handle);
        return 0;
        
    }
    
    
    protected function sendMail(){
        Yii::$app->mailer->compose()
        ->setFrom('flyfame@yeah.net')
        ->setTo('6232967@qq.com')
        ->setSubject('test')
        ->setTextBody('hi man')
        //->setHtmlBody('<b>HTML content</b>')
        ->send();
    }

}
?>

