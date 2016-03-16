<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "{{%video}}".
 *
 * @property string $id
 * @property string $title
 * @property string $thumb
 * @property string $keyword
 * @property string $content
 * @property string $author
 * @property integer $status
 * @property integer $views
 * @property integer $created_at
 * @property integer $updated_at
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%video}}';
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
            [
                'class' => BlameableBehavior::className(),
                'updatedByAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content','url'], 'required'],
            [['content','keyword','video'], 'string'],
            ['url', 'unique', 'targetClass' => '\common\models\Video', 'message' => '网址标记已存在'],
            [['status', 'views', 'created_at', 'updated_at','downtime','class','course','pinglunnum','star'], 'integer'],
            [['title'], 'string', 'max' => 250],
            [['thumb','url'], 'string', 'max' => 120],
            [['author'], 'string', 'max' => 30]
        ];
    }
    public static function types(){
        return Yii::$app->params['type'];
    }
    
    public static function getType($index,$name){
        $arr = Yii::$app->params[$name];;
        if(isset($arr[$index])){
            return $arr[$index];
        }else{
            return "null";
        }
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Pinglun::className(), ['rid' => 'id'])->where(['type'=>0]);
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => '自定义网址',
            'class' => '年级',
            'course' => '课程',
            'title' => '标题',
            'thumb' => '缩略图',
            'keyword' => '简介',
            'video' => '视频',
            'content' => '内容',
            'author' => '作者',
            'status' => '状态',
            'views' => '浏览次数',
            'downtime' => '下载次数',
            'created_at' => '添加时间',
            'updated_at' => '修改时间',
        ];
    }
}
