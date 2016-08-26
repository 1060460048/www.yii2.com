<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
//use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "{{%ads}}".
 *
 * @property string $id
 * @property integer $place
 * @property string $thumb
 * @property string $title
 * @property string $intro
 * @property string $url
 * @property integer $ord
 * @property string $updated_at
 * @property string $created_at
 */
class Ads extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ads}}';
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
            //[
            //    'class' => BlameableBehavior::className(),
            //    'updatedByAttribute' => false,
            //],
            
            
        ];
    }
    public static function place(){
        return [
            '首页抢券(640*252)',
        ];
    }
    public static function getPlace($k){
        $places = self::place();
        if(isset($places[$k])){
            return $places[$k];
        }else{
            return "无";
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['place'], 'required'],
            [['place', 'status'], 'integer'],
            [['updated_at', 'created_at','start_time','end_time'], 'safe'],
            [['thumb', 'url','title'], 'string', 'max' => 100],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'gif, png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'place' => '位置',
            'thumb' => '图片',
            'title' => '标题',
            'url' => '网址',
            'start_time' => '开始时间',
            'end_time' => '结束时间',
            'status' => '状态',
            'imageFile' => '图片',
            'updated_at' => '修改时间',
            'created_at' => '添加时间',
        ];
    }
    
    /*
     * 图片上传
     */
    public function upload() {
        
        //parent::beforeSave($insert);
        
        if ($this->imageFile && $this->validate()) {
            
            $Name = \common\components\Utils::fileName(5);
  
            $fileName = 'upload/ads/' . $Name . '.' .  $this->imageFile->extension;

            $this->imageFile->saveAs(Yii::getAlias("@wwwdir")."/".$fileName);
            $str = "/".$fileName;
    
        } else {
            $str = '';
        }
        
        $this->thumb = $str;
        
        $this->imageFile = null;
        
    }
    
    /*
     * 获取广告信息
     */
    public static function getAd($place){
        $ad = self::find()->where(['place'=>$place,'status'=>1])->one();
        if($ad){
            $now = time();
            $start_time = $ad->start_time;
            $end_time = $ad->end_time;
            if($now > $start_time && $now < $end_time){
                return $ad;
            }
        }
        return false;
    }
}
