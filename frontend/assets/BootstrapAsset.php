<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class BootstrapAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'statics/bootstrap/css/bootstrap.min.css',
    ];
    public $js = [
        'statics/bootstrap/js/bootstrap.min.js',
    ];
    public $depends = [
//        'frontend\assets\JqueryAsset',
        'yii\web\JqueryAsset',
    ];
}
