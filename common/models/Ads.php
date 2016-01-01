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
    public function place(){
        return [
            '首页横幅广告1（1170*90）',
            '首页横幅广告2(1170*70)',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['place', 'thumb'], 'required'],
            [['place', 'ord'], 'integer'],
            [['intro'], 'string'],
            [['updated_at', 'created_at'], 'safe'],
            [['thumb', 'url'], 'string', 'max' => 100],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'gif, png, jpg'],
            [['title'], 'string', 'max' => 200]
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
            'intro' => '简介',
            'url' => '网址',
            'ord' => '排序,数字越小越靠前',
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
}
