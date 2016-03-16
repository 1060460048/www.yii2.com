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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'statics/css/common.css',
    ];
    public $js = [
        'statics/js/jquery.select.js',
        'statics/js/jquery.placeholder.min.js',
        'statics/js/jMenu.jquery.js',
    ];
    public $depends = [
        'frontend\assets\JqueryAsset',
    ];
}
