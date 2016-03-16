<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
//use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "{{%resource}}".
 *
 * @property string $id
 * @property integer $class
 * @property integer $course
 * @property string $title
 * @property string $thumb
 * @property string $keyword
 * @property string $content
 * @property string $author
 * @property integer $status
 * @property integer $views
 * @property integer $downtime
 * @property integer $star
 * @property integer $pinglunnum
 * @property integer $created_at
 * @property integer $updated_at
 */
class Resource extends \yii\db\ActiveRecord
{
    
    public $imageFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%resource}}';
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class', 'course', 'title', 'content','url'], 'required'],
            ['url', 'unique', 'targetClass' => '\common\models\Resource', 'message' => '网址标记已存在'],
            [['class', 'course', 'status', 'views', 'downtime', 'star', 'pinglunnum', 'created_at', 'updated_at','type'], 'integer'],
            [['content','keyword'], 'string'],
            [['title'], 'string', 'max' => 100],
            [['thumb','url'], 'string', 'max' => 120],
            [['author'], 'string', 'max' => 30],
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
            'url' => '自定义网址',
            'type' => '类型',
            'class' => '年级',
            'course' => '课程',
            'title' => '标题',
            'thumb' => '封面图',
            'imageFile' => '缩略图',
            'keyword' => '简介',
            'content' => '内容',
            'author' => '作者',
            'status' => '状态',
            'views' => '浏览数',
            'downtime' => '下载次数',
            'star' => '星级',
            'pinglunnum' => '评论数',
            'created_at' => '添加时间',
            'updated_at' => '修改时间',
        ];
    }
    /*
     * 评论
     */
    public function getComments()
    {
        return $this->hasMany(Pinglun::className(), ['rid' => 'id','type'=>'type']);
    }
    /*
     * 获取数据类型
     */
    public static function getType($index,$name){
        $arr = Yii::$app->params[$name];;
        if(isset($arr[$index])){
            return $arr[$index];
        }else{
            return "null";
        }
    }
    /*
     * 缩略图上传
     */
    public function upload() {
        //parent::beforeSave($insert);
        if ($this->imageFile && $this->validate()) {
            $Name = \common\components\Utils::fileName(5);
            $fileName = 'upload/resource/' . $Name . '.' .  $this->imageFile->extension;
            $this->imageFile->saveAs(Yii::getAlias("@wwwdir")."/".$fileName);
            $str = "/".$fileName;
        } else {
            $str = '';
        }
        $this->thumb = $str;
        $this->imageFile = null;
    }
    
}
