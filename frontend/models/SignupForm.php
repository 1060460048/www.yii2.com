<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $truename;
    public $email;
    public $phone;
    public $password;
    public $captcha;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => '用户名已经被占用啦'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['truename', 'string', 'min' => 2, 'max' => 3],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            
            ['phone', 'required'],
            ['phone', 'integer','message'=>'手机号码应为数字'],
            ['phone', 'isMobile'],
            ['phone', 'unique', 'targetClass' => '\common\models\User', 'message' => '手机号已经存在啦'],
            
            ['captcha', 'required',],
            ['captcha', 'captcha'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->truename = $this->truename;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
    
    public function isMobile($attribute,$params){
       $result =  \common\components\Utils::isMobile($this->$attribute);
       if(!$result){
           $this->addError($attribute, '手机号码格式错误');
       }
    }
}
