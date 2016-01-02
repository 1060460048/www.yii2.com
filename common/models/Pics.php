<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
//use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "{{%pics}}".
 *
 * @property string $id
 * @property integer $type
 * @property string $name
 * @property string $intro
 * @property string $duty
 * @property string $thumb
 * @property string $content
 * @property integer $status
 * @property integer $views
 * @property integer $created_at
 * @property integer $updated_at
 */
class Pics extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pics}}';
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
    public function types(){
        return [
            '老师',
            '学生',
            '校园展示',
            '活动展示',
        ];
    }
    /*
     * 获取Type 名
     */
    public function getTypeName($typeid){
        $types = $this->types();
        if(isset($types[$typeid])){
            return $types[$typeid];
        }
        return "";
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type',], 'required'],
            [['type', 'status', 'views', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
            [['name', 'duty'], 'string', 'max' => 100],
            [['intro'], 'string', 'max' => 255],
            [['thumb'], 'string', 'max' => 200],
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
            'type' => '类别',
            'name' => '姓名',
            'intro' => '简介',
            'duty' => '职位',
            'thumb' => '缩略图（建议1：1的正方形图）',
            'content' => '内容',
            'status' => '状态',
            'views' => '浏览次数',
            'imageFile' => '缩略图',
            'created_at' => '添加时间',
            'updated_at' => '修改时间',
        ];
    }
    /*
     * 缩略图上传
     */
    public function upload() {
        
        //parent::beforeSave($insert);
        
        if ($this->imageFile && $this->validate()) {
            
            $Name = \common\components\Utils::fileName(5);
  
            $fileName = 'upload/pics/' . $Name . '.' .  $this->imageFile->extension;
            $this->imageFile->saveAs(Yii::getAlias("@wwwdir")."/".$fileName);
            $str = "/".$fileName;
    
        } else {
            $str = 'pic error';
        }
        
        $this->thumb = $str;
        
        $this->imageFile = null;
        
    }
}
