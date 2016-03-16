<?php
namespace frontend\controllers;

use yii;
use frontend\components\Controller;
use common\models\Category;
use common\models\Slider;
use common\models\News;
use common\models\Singlepage;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;

use yii\web\NotFoundHttpException;
/**
 * Site controller
 */
class SiteController extends Controller
{
    public function actions() {
        return [
             'captcha' => [
                  'class' => 'yii\captcha\CaptchaAction',
                  'maxLength' => 5,
                  'minLength' => 5
             ],
         ];
    }
    public function actionIndex(){
        //轮播图
        $slider = Slider::find()->where(['place'=>0])->orderBy(['ord'=>SORT_ASC])->all();
        //微课
        $weike = \common\models\Video::find()->where(['and',['status'=>  \common\models\Status::STATUS_REC]])->limit(6)->all();
        //教案
        $jiaoan = \common\models\Resource::find()->where(['and',['type'=>0],['status'=>  \common\models\Status::STATUS_REC]])->limit(3)->all();
        //课件
        $kejian = \common\models\Resource::find()->where(['and',['type'=>1],['status'=>  \common\models\Status::STATUS_REC]])->limit(3)->all();
        //试题
        $shiti = \common\models\Resource::find()->where(['and',['type'=>2],['status'=>  \common\models\Status::STATUS_REC]])->limit(3)->all();
        //新闻公告
        $news = \common\models\News::find()->where(['and','status>'.\common\models\Status::STATUS_INACTIVE])->orderBy(['id'=>SORT_DESC])->limit(3)->all();
        //推荐下载
        $recdown = \common\models\Resource::find()->where(['and',['status'=>  \common\models\Status::STATUS_REC]])->orderBy(['id'=>SORT_DESC])->limit(4)->all();
        //最新评价
        $pinglun = \common\models\Pinglun::find()->where(['and','status>'.\common\models\Status::STATUS_INACTIVE])->orderBy(['id'=>SORT_DESC])->limit(6)->all();
        //学霸必备
        $xueba = \common\models\Resource::find()->where(['and','status>'. \common\models\Status::STATUS_REC])->orderBy(['rand()' => SORT_DESC])->limit(10)->all();
        //友情链接
        $friendLink = \common\models\Friendlink::find()->where(['isshow'=>  \common\models\YesNo::YES])->orderBy(['ord'=>SORT_ASC])->all();
        return $this->render('index',[
            //'bigCate'=>$bigCate,
            'slider'=>$slider,
            'weike'=>$weike,
            'jiaoan'=>$jiaoan,
            'kejian'=>$kejian,
            'shiti'=>$shiti,
            'news'=>$news,
            'recdown'=>$recdown,
            'pinglun'=>$pinglun,
            'xueba'=>$xueba,
            'friendlink'=>$friendLink,
        ]);
    }
    /*
     * 登录页面
     */
    public function actionLogin(){
        //echo Yii::$app->request->referrer;
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        if (Yii::$app->request->get('returnUrl') || Yii::$app->session->get('returnUrl')) {
            $url = Yii::$app->request->get('returnUrl')?Yii::$app->request->get('returnUrl'):Yii::$app->session->get('returnUrl');
            Yii::$app->user->setReturnUrl($url);
        }else{
            Yii::$app->session->set('returnUrl', Yii::$app->request->referrer);
        }
        $model = new \frontend\models\LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        
        return $this->render('login', [
            'model' => $model,
        ]);
        
    }
    
    /*
     * 注册页面
     */
    public function actionReg(){
        $model = new \frontend\models\SignupForm;
        if($model->load(Yii::$app->request->post())){
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
        return $this->render('reg',[
            'model'=>$model,
        ]);
    }
    
    
    /**
     * 退出登录
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('key', '重置密码邮件已发送，请查收');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('key', '对不起，邮件发送失败，请联系管理员');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('key', '新密码设置成功！');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    
    
    /*
     * 联系我们
     */
    public function actionAbout(){
        $model = $this->findSinglePage(2);
        return $this->render('about',['model'=>$model]);
    }
    /*
     * 关于我们
     */
    public function actionContact(){
        $model = $this->findSinglePage(1);
        return $this->render('contact',['model'=>$model]);
    }
    
    
    
    /*
     * 在线报名
     */
    public function actionFeed(){
        $model = new \common\models\Feedback();
        if($model->load(Yii::$app->request->post()) && $model->save()){
            echo "<script>alert('留言信息提交成功！');window.history.go(-1);</script>";
        }else{
            echo "<script>alert('提交失败,请确认是否登录并完善信息！');window.history.go(-1);</script>";
        }
        //return $this->render('feedback',['model'=>$model]);
        //return $this->render('feedback');
    }
    /*
     * 评论写入数据库
     */
    public function actionSaveComment(){
        $model = new \common\models\Pinglun();
        $model->status = 1;
        $model->created_by = Yii::$app->user->id;
        if($model->load(Yii::$app->request->post()) && $model->save()){
            echo "<script>alert('评论发布成功！');window.history.go(-1);</script>";
        }else{                                  
            echo "<script>alert('提交失败,请完善信息！');window.history.go(-1);</script>";
        }
        //return $this->render('feedback',['model'=>$model]);
        //return $this->render('feedback');
    }
    /*
     * 查找单页内容
     */
    protected function findSinglePage($id){
        if(($model = Singlepage::findOne($id)) !== null){
            return $model;
        }else{
            throw new NotFoundHttpException('你访问的页面不存在！');
        }
    }
}
