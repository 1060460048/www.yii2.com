<?php
namespace frontend\controllers;

use yii;
use frontend\components\Controller;
use common\models\Video;
use common\models\Resource;
use common\models\Pinglun;
use common\models\Status;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class ResourceController extends Controller
{
    /*
     * 列表页
     */
    public function actionIndex(){
        $type = Yii::$app->request->get('type');
        $class = Yii::$app->request->get('class');
        $course = Yii::$app->request->get('course');
        $key = Yii::$app->request->get('key');
        $sort = Yii::$app->request->get('sort');
        //条件
        $where[] = 'and';
        $where[] = 'status>'.Status::STATUS_INACTIVE;
        if(!is_null($class)){
            $where[] = ['class'=>$class];
        }
        if(!is_null($course)){
            $where[] = ['course'=>$course];
        }
        if(!is_null($key)){
            $where[] = ['like','title',$key];
        }
        //排序
        $sort = ['created_at'=>SORT_DESC];
        if($sort == 'star'){
            $sort = ['star'=>SORT_DESC];
        }
        //课程类型
        if($type == 0){
            $query = Video::find()->where($where);
            
            //查询4条推荐信息
            $where[1] = 'status='.Status::STATUS_REC;
            $infoRec = Video::find()->where($where)->limit(4)->all();
            
        }else{
            $where[] = ['type'=>$type];
            $query = Resource::find()->where($where);
            
            //查询4条推荐信息
            $where[1] = 'status='.Status::STATUS_REC;
            $infoRec = Resource::find()->where($where)->limit(4)->all();
            
        }
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>['defaultOrder'=>$sort],
            'pagination'=>['pageSize' => 15,],
        ]);
        
        return $this->render('index', [
            'models' => $dataProvider->getModels(),
            'pagination' => $dataProvider->pagination,
            'type'=>$type,
            'class'=>$class,
            'course'=>$course,
            'key'=>$key,
            'infoRec'=>$infoRec,
        ]);
        
    }
    
    
    public function actionVideo($u = 1){
        $model = $this->findModel('\common\models\Video',$u);
        $model->views += 1;
        $x = $model->save();
        
        //写入观看记录
        if(!Yii::$app->user->isGuest){
            if(!$uc = \common\models\UserCourse::find()->where(['uid'=>Yii::$app->user->id,'type'=>0,'rid'=>$model->id])->one()){
            
                $uc = new \common\models\UserCourse();
                $uc->uid = Yii::$app->user->id;
                $uc->type = 0;
                $uc->rid = $model->id;
                
            }
            $uc->save();
            
        }

        return $this->render('video-show',[
            'model'=>$model,
           
        ]);
    }
    public function actionShow($u = 1){
        $model = $this->findModel('\common\models\Resource',$u);
        $model->views += 1;
        $model->save();
       
        //写入观看记录
        if(!Yii::$app->user->isGuest){
            
            if(!$uc = \common\models\UserCourse::find()->where(['uid'=>Yii::$app->user->id,'type'=>$model->type,'rid'=>$model->id])->one()){
            
                $uc = new \common\models\UserCourse();
                $uc->uid = Yii::$app->user->id;
                $uc->type = $model->type;
                $uc->rid = $model->id;
                
            }
            $uc->save();
           
        }
        
        return $this->render('show',[
            'model'=>$model,
        ]);
    }
    /*
     * 加载评论
     */
    public function actionComment($id,$type){
        $this->layout = false;
        //查询评论信息
        $query = Pinglun::find()->where(['type'=>$type,'rid'=>$id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>['defaultOrder'=>['created_at'=>SORT_DESC]],
            'pagination'=>['pageSize' => 15],
        ]);
        
        return $this->render('_comment',[
            'models' => $dataProvider->getModels(),
            'pagination' => $dataProvider->pagination,
        ]);
    }
    
    
    
    protected function findModel($modelName = "Video",$id){
        if (($model = $modelName::find()->where(['and',['url'=>$id],'status>'.Status::STATUS_INACTIVE])->One()) !== null) {
            return $model;
        }else {
            echo "<script>alert('信息审核中，或不存');window.history.go(-1);</script>";
            //throw new NotFoundHttpException('你所查找的网页不存在');
            die;
        }
    }
    
    
}
