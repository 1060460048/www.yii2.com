<?php
namespace frontend\controllers;

use yii;
use frontend\components\Controller;
use common\models\User;

use yii\web\NotFoundHttpException;
/**
 * Site controller
 */
class UserController extends Controller
{
    
    public function behaviors()
    {
        return [
            
            'access' => [
                'class' => yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    
    public function actions()
    {
        return [
            'upload' => [
                'class' => 'kucha\ueditor\UEditorAction',
                'config' => [
                    //"imageUrlPrefix"  => "http://www.baidu.com",//图片访问路径前缀
                    'allowDivTransToP'=>false,
                    "imagePathFormat" => "/upload/images/{yyyy}{mm}{dd}/{time}{rand:6}" //上传保存路径
                ],
            ]
        ];
    }
    
    public function actionIndex(){
       
        return $this->render('index',[
            
        ]);
    }
    /*
     * 登录页面
     */
    public function actionBasic(){
        
        
        return $this->render('basic', [
            
        ]);
        
    }
    /*
     * 上传token
     */
    public function actionUptoken(){
        header('Content-type: text/json');
        //Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $accessKey = 'eHpOIEZfVjluFyrGrB33lCRC-dAI7lfLp5aN2ZQN';
        $secretKey = 'ehOcyV3hABPK9ibF4wbtMf3l1Id_Gfa8bTriG76L';
        $auth = new \Qiniu\Auth($accessKey, $secretKey);
        $bucket = "jianyangjiaoyu";
        $token = $auth->uploadToken($bucket);
        $rtn['uptoken'] = $token;
        echo json_encode($rtn);
    }
    /*
     * 修改密码
     */
    public function actionChangePassword(){
        $model = User::findOne(Yii::$app->user->id);
        if(Yii::$app->request->isPost){
            $info = Yii::$app->request->post();
            if($info['oldpass'] == '' || $info['password'] == ''){
                Yii::$app->session->setFlash('key', '请完善输入信息！');
                return $this->render('change-password',[
                    'model'=>$model,
                ]);
                return false;
                
            }else{
                if(!$model->validatePassword($info['oldpass'])){
                    Yii::$app->session->setFlash('key', '原始密码输入错误！');
                    return $this->render('change-password',[
                        'model'=>$model,
                    ]);
                    return false;
                }
                
            }
            
            
            if($info['password'] != $info['repassword']){
                Yii::$app->session->setFlash('key', '2次密码输入不一致！');
                return $this->render('change-password',[
                    'model'=>$model,
                ]);
                return false;
            }
            
            $model->setPassword($info['password']);
            if($model->save(false)){
                Yii::$app->session->setFlash('key', '密码修改成功！');
            }
            
        }
        return $this->render('change-password',[
            'model'=>$model,
        ]);
    }
    
    
    /**
     * 我的课程
     *
     * @return mixed
     */
    public function actionCourse($type)
    {
        $where[] = 'and';
        $where[] = ['type'=>$type];
        $where[] = ['uid'=>Yii::$app->user->id];
        $query = \common\models\UserCourse::find()->where($where);
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['defaultPageSize' => 8],
            'sort' => ['defaultOrder' => ['created_at' => SORT_DESC]],
        ]);
        
        return $this->render('course', [
            'models' => $dataProvider->getModels(),
            'pagination' => $dataProvider->pagination,
            'type' => $type,
        ]);

    }
    
    
    
    /*
     * 我的评论
     */
    public function actionPinglun(){
        $where[] = 'and';
        $where[] = ['created_by'=>Yii::$app->user->id];
        $query = \common\models\Pinglun::find()->where($where);
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['defaultPageSize' => 8],
            'sort' => ['defaultOrder' => ['created_at' => SORT_DESC]],
        ]);
        
        return $this->render('pinglun', [
            'models' => $dataProvider->getModels(),
            'pagination' => $dataProvider->pagination,
 
        ]);

    }
    /*
     * 上传视频
     */
    public function actionMyVideo(){
        $where[] = 'and';
        $where[] = ['created_by'=>Yii::$app->user->id];
        $query = \common\models\Video::find()->where($where);
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['defaultPageSize' => 6],
            'sort' => ['defaultOrder' => ['created_at' => SORT_DESC]],
        ]);
        
        return $this->render('my-video', [
            'models' => $dataProvider->getModels(),
            'pagination' => $dataProvider->pagination,
 
        ]);
        
    }
    /*
     * 上传视频
     */
    public function actionUploadVideo(){
       $model = new \common\models\Video();
        $model->status = \common\models\Status::STATUS_INACTIVE;
        $model->url = "".time();
        $model->thumb = "1";
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //Yii::$app->session->setFlash('key', '发布成功！');
            echo "<script>alert('发布成功');window.location.href='/user/my-video';</script>";
            //return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('upload-video', [
            'model' => $model,
        ]);
        
    }
    /*
     * 上传头像
     */
    public function actionUploadHead(){
        Yii::$app->response->format = yii\web\Response::FORMAT_XML;      
		$model = User::findOne(Yii::$app->user->id);
		if ($model && Yii::$app->request->isPost){
			$model->file = \yii\web\UploadedFile::getInstance($model, 'file');
			if ($model->file && $model->validate()) {
				$path = '/upload/userhead/';
  
				//if(!file_exists(Yii::getAlias("@wwwdir").$path))mkdir(Yii::getAlias("@wwwdir").$path);
	
				$filename="u-".Yii::$app->user->id . '.' . $model->file->extension;
                $model->avatar = $path.$filename;
                //error_reporting(0);
				if($model->save() && $model->file->saveAs(Yii::getAlias("@wwwdir").$path.$filename)){
                    
                    return ["result"=>"Success","url"=>$path.$filename];
                
                }
						
				else return ["result"=>"Fail"];
			}
			return ["result"=>"ValidFail"];
		}
		return ["result"=>"PostFail"];
    }
}
