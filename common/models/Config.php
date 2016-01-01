<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
//use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "{{%config}}".
 *
 * @property string $id
 * @property string $sitename
 * @property string $description
 * @property string $keywords
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $beianhao
 * @property string $tongji
 * @property string $n1
 * @property string $n2
 * @property string $n3
 * @property string $n4
 * @property string $n5
 * @property string $n6
 * @property string $n7
 * @property string $n8
 */
class Config extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%config}}';
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
            [['tongji'], 'string'],
            [['sitename', 'beianhao', 'n2', 'n3', 'n4', 'n5', 'n6', 'n7', 'n8'], 'string', 'max' => 100],
            [['description', 'keywords'], 'string', 'max' => 200],
            [['address','n1'], 'string', 'max' => 230],
            [['phone', 'email'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sitename' => '网站名字',
            'description' => '网站描述',
            'keywords' => '关键词',
            'address' => '联系地址',
            'phone' => '电话',
            'email' => '邮箱',
            'beianhao' => '备案号',
            'tongji' => '统计代码',
            'n1' => '网页底部介绍',
            'n2' => '交流QQ群',
            'n3' => '黄老师手机',
            'n4' => '刘老师手机',
            'n5' => 'N5',
            'n6' => 'N6',
            'n7' => 'N7',
            'n8' => 'N8',
        ];
    }
}
