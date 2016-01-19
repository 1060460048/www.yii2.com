<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
//use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "{{%friendlink}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $link
 * @property integer $isshow
 * @property integer $ord
 * @property string $created_at
 * @property string $updated_at
 */
class Friendlink extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%friendlink}}';
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
            [['name', 'link'], 'required'],
            [['isshow', 'ord'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'link','thumb'], 'string', 'max' => 100],
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
            'name' => '名称',
            'link' => '链接',
            'isshow' => '是否显示',
            'ord' => '排序',
            'created_at' => '添加时间',
            'updated_at' => '修改时间',
            'imageFile' => '图片',
            'thumb' => '图片',
        ];
    }
    public function upload() {
        
        //parent::beforeSave($insert);
        
        if ($this->imageFile && $this->validate()) {
            
            $Name = \common\components\Utils::fileName(5);
  
            $fileName = 'upload/friendlink/' . $Name . '.' .  $this->imageFile->extension;

            $this->imageFile->saveAs(Yii::getAlias("@wwwdir")."/".$fileName);
            $str = "/".$fileName;
    
        } else {
            $str = '';
        }
        
        $this->thumb = $str;
        
        $this->imageFile = null;
        
    }
}
