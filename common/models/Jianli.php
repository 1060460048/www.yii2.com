<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
//use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "{{%jianli}}".
 *
 * @property string $id
 * @property string $xingming
 * @property string $xingbie
 * @property string $nianling
 * @property string $xueli
 * @property string $xiangguanzhengshu
 * @property string $yingpingzhiwei
 * @property string $qiwangxinzi
 * @property string $gerenjianjie
 * @property string $qitayaoqiu
 * @property string $lianxidianhua
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $end_at
 * @property integer $views
 * @property string $author
 * @property string $jobtype
 */
class Jianli extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%jianli}}';
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
            [['xingming'], 'required'],
            [['created_at', 'updated_at', 'end_at', 'views'], 'integer'],
            [['xingming', 'xingbie', 'nianling', 'xueli', 'xiangguanzhengshu', 'yingpingzhiwei', 'qiwangxinzi', 'gerenjianjie', 'qitayaoqiu', 'lianxidianhua', 'author', 'jobtype'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'xingming' => '姓名',
            'xingbie' => '性别',
            'nianling' => '年龄',
            'xueli' => '学历',
            'xiangguanzhengshu' => '相关证书',
            'yingpingzhiwei' => '应聘职位',
            'qiwangxinzi' => '期望薪资',
            'gerenjianjie' => '个人简介',
            'qitayaoqiu' => '其他要求',
            'lianxidianhua' => '联系电话',
            'created_at' => '添加时间',
            'updated_at' => '修改时间',
            'end_at' => 'End At',
            'views' => '浏览量',
            'author' => '来源',
            'jobtype' => 'Jobtype',
        ];
    }
}
