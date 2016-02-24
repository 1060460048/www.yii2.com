<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
//use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "{{%news}}".
 *
 * @property string $id
 * @property integer $category_id
 * @property string $title
 * @property string $thumb
 * @property string $keyword
 * @property string $description
 * @property string $intro
 * @property string $content
 * @property string $author
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class News extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news}}';
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
            [['category_id', 'title', 'content'], 'required'],
            [['category_id', 'status','created_at','views', 'updated_at'], 'integer'],
            [['description', 'intro', 'content'], 'string'],
            [['title', 'keyword'], 'string', 'max' => 100],
            [['thumb'], 'string', 'max' => 120],
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
            'category_id' => '所属栏目',
            'title' => '标题',
            'thumb' => '缩略图',
            'keyword' => '关键词',
            'description' => '描述',
            'intro' => '简介',
            'content' => '内容',
            'author' => '作者',
            'status' => '状态',
            'created_at' => '添加时间',
            'updated_at' => '修改时间',
            'imageFile' => '缩略图',
        ];
    }
    
    public function getCategory(){
        return $this->hasOne(Category::className(),['id'=>'category_id']);
    }
    
    /*
     * 获取上一篇
     */
    public function getPrev(){
        return self::find()->where(['and','category_id='.$this->category_id,'id<'.$this->id,'status>='.Status::STATUS_ACTIVE])->one();
        
    }
    /*
     * 下一篇
     */
    public function getNext(){
        return self::find()->where(['and','category_id='.$this->category_id,'id>'.$this->id,'status>='.Status::STATUS_ACTIVE])->one();
        
    }
    
    /*
     * 获取部分新闻 根据分类
     */
    static public function getNews($cid,$num){
        $allCategory = Category::find()->asArray()->all();
        $arrayCategoryIdName = \yii\helpers\ArrayHelper::map($allCategory, 'id', 'name');
        $arrSubCat = Category::getArraySubCatalogId($cid, $allCategory);
        $where = [
            'and',
            ['category_id'=>$arrSubCat],
            'status>='.Status::STATUS_ACTIVE,
        ];
        $news = News::find()->where($where)->limit($num)->all();
        return $news;
    }
    /*
     * 获取某个分类下的推荐信息
     */
    static function getRecNews($cid,$num){
        $allCategory = Category::find()->asArray()->all();
        $arrayCategoryIdName = \yii\helpers\ArrayHelper::map($allCategory, 'id', 'name');
        $arrSubCat = Category::getArraySubCatalogId($cid, $allCategory);
        $where = [
            'and',
            ['category_id'=>$arrSubCat],
            'status>='.Status::STATUS_REC,
        ];
        $news = News::find()->where($where)->limit($num)->all();
        return $news;
    }
    /*
     * 缩略图上传
     */
    public function upload() {
        
        //parent::beforeSave($insert);
        
        if ($this->imageFile && $this->validate()) {
            
            $Name = \common\components\Utils::fileName(5);
  
            $fileName = 'upload/news/' . $Name . '.' .  $this->imageFile->extension;
            $this->imageFile->saveAs(Yii::getAlias("@wwwdir")."/".$fileName);
            $str = "/".$fileName;
    
        } else {
            $str = '';
        }
        
        $this->thumb = $str;
        
        $this->imageFile = null;
        
    }
}
