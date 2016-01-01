<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandOptions'=>[
        'id'=>'brand'
    ],
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-darkblue navbar-fixed-top',
        'id'=>'navigation',
    ],
]);
$menuItemsMain = [
    [
        'label' => "资讯",
        'url' => ['#'],
        'active' => false,
        'items' => [
            [
                'label' => "分类管理",
                'url' => ['/category'],
            ],
            [
                'label' => "资讯管理",
                'url' => ['/news'],
            ],
            
        ],
  
    ],
    
    
    [
        'label' => '单页管理',
        'url' => ['#'],
        'active' => false,
        'items' => [
            [
                'label' => '管理',
                'url' => ['/singlepage/index'],
            ],
            [
                'label' => '添加',
                'url' => ['/singlepage/create'],
            ],
            
        ],
    ],
    [
        'label' => '师生风采',
        'url' => ['#'],
        'active' => false,
        'items' => [
            [
                'label' => '管理',
                'url' => ['/album/index'],
            ],
            [
                'label' => '添加',
                'url' => ['/album/create'],
            ],
            
        ],
    ],
    [
        'label' => '招聘管理',
        'url' => ['#'],
        'active' => false,
        'items' => [
            [
                'label' => '招聘企业管理',
                'url' => ['/company/index'],
            ],
            [
                'label' => '招聘职位管理',
                'url' => ['/jobs/index'],
            ],
            [
                'label' => '简历管理',
                'url' => ['/jianli/index'],
            ],
            
        ],
    ],
    [
        'label' => '商品信息价',
        'url' => ['#'],
        'active' => false,
        'items' => [
            [
                'label' => '商品管理',
                'url' => ['/goods/index'],
            ],
            [
                'label' => '价格变更日志',
                'url' => ['/goods-pricelog/index'],
            ],
        ],
    ],
    [
        'label' => '下载管理',
        'url' => ['#'],
        'active' => false,
        'items' => [
            [
                'label' => '下载文件管理',
                'url' => ['/file-download/index'],
            ],
            [
                'label' => '添加下载文件',
                'url' => ['/file-download/create'],
            ],
          
        ],
    ],
    [
        'label' => '试听管理',
        'url' => ['#'],
        'active' => false,
        'items' => [
            [
                'label' => '试听管理',
                'url' => ['/video/index'],
            ],
            [
                'label' => '添加试听课程',
                'url' => ['/video/create'],
            ],
          
        ],
    ],
    
    [
        'label' => '<i class="fa fa-cog"></i> ' . Yii::t('app', 'System'),
        'url' => ['#'],
        'active' => false,
        //'visible' => Yii::$app->user->can('haha'),
        'items' => [

            [
                'label' => '站点配置',
                'url' => ['/config/update','id'=>1],
            ],
            [
                'label' => '<i class="fa fa-lock"></i> ' . "首页轮播图",
                'url' => ['/slider'],
            ],
            [
                'label' => '<i class="fa fa-lock"></i> ' . "首页考试提醒",
                'url' => ['/kaoshi'],
            ],
            [
                'label' => '友情链接管理',
                'url' => ['/friendlink'],
            ],
            [
                'label' => '网页广告管理',
                'url' => ['/ads'],
            ],
        ],
    ],
];
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-left'],
    'items' => $menuItemsMain,
    'encodeLabels' => false,
]);
$menuItems = [
    [
        'label' => Yii::t('app', 'Modify Password'),
        'url' => ['site/change-password'],
    ],
    ['label' => Yii::t('app', 'Home'), 'url' => '/','linkOptions'=>['target'=>'_blank']],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']];
} else {
    $menuItems[] = [
        'label' => Yii::t('app', 'Logout') . '(' . Yii::$app->user->identity->username . ')',
        'url' => ['/site/logout'],
        'linkOptions' => ['data-method' => 'post']
    ];
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
]);
NavBar::end();