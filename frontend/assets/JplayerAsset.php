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
class JplayerAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'statics/jplayer/blue.monday/css/jplayer.blue.monday.min.css'
    ];
    public $js = [
        'statics/jplayer/jquery.jplayer.min.js',
    ];
    public $depends = [
        //'frontend\assets\JqueryAsset',
        'frontend\assets\AppAsset',
    ];
}
