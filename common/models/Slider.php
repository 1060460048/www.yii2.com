<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "slider".
 *
 * @property string $id
 * @property integer $place
 * @property string $thumb
 * @property string $intro
 * @property string $url
 * @property integer $ord
 * @property string $updated_at
 * @property string $created_at
 */
class Slider extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%slider}}';
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],

        ];
    }
    /*
     * 轮播图位置
     */
    public static function places(){
        return [
            '首页'
        ];
    }
    
    public function getPlace($placeid){
        $palces = self::places();
        return $palces[$placeid];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['place'], 'required'],
            [['place', 'ord'], 'integer'],
            [['intro'], 'string'],
            [['updated_at', 'created_at'], 'safe'],
            [['thumb', 'url'], 'string', 'max' => 100],
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
            'intro' => '简介',
            'url' => '链接',
            'ord' => '排序',
            'updated_at' => '修改时间',
            'created_at' => '添加时间',
            'imageFile' => '图片',
        ];
    }
    public function upload() {
        
        //parent::beforeSave($insert);
        
        if ($this->imageFile && $this->validate()) {
            
            $Name = \common\components\Utils::fileName(5);
  
            $fileName = 'upload/slider/' . $Name . '.' .  $this->imageFile->extension;

            $this->imageFile->saveAs(Yii::getAlias("@wwwdir")."/".$fileName);
            $str = "/".$fileName;
    
        } else {
            $str = '';
        }
        
        $this->thumb = $str;
        
        $this->imageFile = null;
        
    }
   
}
