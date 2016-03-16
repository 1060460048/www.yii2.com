<?php
return [
    'name' => '简扬教育',
    'timeZone' => 'Asia/Shanghai',
    'language' => 'zh-CN',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
