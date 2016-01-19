<?php
/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-11-7 10:41:02
 */
namespace common\components;

use yii;

class Utils
{
    
    //过滤换行制表符
    public static function stripNr($string, $js = false) {
        $string = str_replace(array(chr(13), chr(10), "\n", "\t", "\r", '  '), array('', '', '', '', '', ''), $string);
        if ($js)
            $string = str_replace("'", "\'", $string);
        return $string;
    }
    //截取字符串
    public static function cutStr($string, $length, $dot = '...', $charset = 'utf-8') {
        $string = self::stripNr($string);
        if (strlen($string) <= $length) {
            return $string;
        }
        $pre = chr(1);
        $end = chr(1);
        $string = str_replace(array('&amp;', '&quot;', '&lt;', '&gt;'), array($pre . '&' . $end, $pre . '"' . $end, $pre . '<' . $end, $pre . '>' . $end), $string);
        $strcut = '';
        if (strtolower($charset) == 'utf-8') {
            $n = $tn = $noc = 0;
            while ($n < strlen($string)) {
                $t = ord($string[$n]);
                if ($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
                    $tn = 1;
                    $n ++;
                    $noc ++;
                } elseif (194 <= $t && $t <= 223) {
                    $tn = 2;
                    $n += 2;
                    $noc += 2;
                } elseif (224 <= $t && $t <= 239) {
                    $tn = 3;
                    $n += 3;
                    $noc += 2;
                } elseif (240 <= $t && $t <= 247) {
                    $tn = 4;
                    $n += 4;
                    $noc += 2;
                } elseif (248 <= $t && $t <= 251) {
                    $tn = 5;
                    $n += 5;
                    $noc += 2;
                } elseif ($t == 252 || $t == 253) {
                    $tn = 6;
                    $n += 6;
                    $noc += 2;
                } else {
                    $n ++;
                }

                if ($noc >= $length) {
                    break;
                }
            }
            if ($noc > $length) {
                $n -= $tn;
            }
            $strcut = substr($string, 0, $n);
        } else {
            for ($i = 0; $i < $length; $i ++) {
                $strcut .= ord($string[$i]) > 127 ? $string[$i] . $string[++$i] : $string[$i];
            }
        }
        $strcut = str_replace(array($pre . '&' . $end, $pre . '"' . $end, $pre . '<' . $end, $pre . '>' . $end), array('&amp;', '&quot;', '&lt;', '&gt;'), $strcut);
        $pos = strrpos($strcut, chr(1));
        if ($pos !== false) {
            $strcut = substr($strcut, 0, $pos);
        }
        return $strcut . $dot;
    }
    
    /*
     *生成上传文件名@lmy 
     */
    public static function fileName($randLength = 5){
        return date('Ymdhis',time()).self::randNum($randLength);
    }
    
    /*
     * 生成随机数
     */
    public static function randNum($length = 4){
        $min = pow(10 , ($length - 1));
        $max = pow(10, $length) - 1;
        return mt_rand($min, $max);
    }
    
    /*
     * 读取 session 
     * 官方session辅助函数，增加了有效期判断
     * 如果你的session没设置lifetime就正常读取就好
     */
    public static function getSession($name){
        $session = Yii::$app->session;
        if ($session->has($name)){
            $info = $session->get($name);
            if(isset($info['lifetime'])){
                if($info['lifetime'] > time()){
                    return $info;
                }else{
                    $session->remove($name);
                }
            }
        }
        return false;
    }
    
    //检测email
    public static function isEmail($str) {
        if (!$str)
            return false;
        return preg_match("/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/", $str);
    }
    
    //检测座机
    public static function isTel($str) {
        if (!$str)
            return false;
        return preg_match("/^([0-9]{2,4}-)?(0[0-9]{2,3}-)?([2-9][0-9]{6,7})+(-[0-9]{1,4})?$/", $str);
    }

    //检测手机
    public static function isMobile($str) {
        if (!$str)
            return false;
        return preg_match("/^(13|14|15|17|18)[0-9]{9}$/", $str);
    }
    
    /*
     * 随机字符串 生成一个包含 大写英文字母, 小写英文字母, 数字 的数组
     */
    public static function randStr($length){
        $arr = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
        $str = '';
        $arr_len = count($arr);
        for ($i = 0; $i < $length; $i++){
            $rand = mt_rand(0, $arr_len-1);
            $str.=$arr[$rand];
        }
        return $str;
    }
    
    /*
     * 设置提示消息
     */
    public static function setFlash($key = 'key',$value){
        $session = Yii::$app->session;
        $session->setFlash('key', $value);
    }
    
    /*
     * 读取提示消息
     */
    public static function getFlash($key = 'key'){
        $session = Yii::$app->session;
        if($session->hasFlash($key)){
            $content = $session->getFlash($key);
            return $content;
        }else{
            return false;
        }
    }
    /*
     * 隐藏名字中间字符
     */
    public static function hideMiddle($string){
        $string = trim($string);
        if (!strlen($string)) {
            return ;
        }

        $first = mb_substr($string, 0, 1);
        $last = mb_substr($string, -1, 1);

        return $first . '***' . $last;
    }
    /*
     * 格式化日期
     */
    public static function dateFormat($time = 0, $type = 0) {
        if (!$time) {
            return '';
        }
        $types = array('Y-m-d', 'Y', 'm-d','d', 'Y-m-d H:i:s', 'Y-m-d H:i', 'm-d H:i', 'Y/m','Y年m月d日 H:i:s');
        if (isset($types[$type])) {
            $type = $types[$type];
        }
        return date($type, $time);
    }
    /*$date1, $date2 unix timestamp
     * 2个日期之间间隔的天数
     */
    static public function daysbetweendates($date1, $date2){ 
        $days = ceil(abs($date1 - $date2)/86400); 
        return $days; 
    }

    // 获取内容第一张图片
    public static function getImgOne($content, $ext = 'jpg|jpeg|gif|png|bmp') {
        $img = '';
        preg_match_all("/src=([\"|']?)([^ \"'>]+\.($ext))\\1/i", $content, $matches);
        if ($matches && isset($matches[2][0])) {
            $img = $matches[2][0];
        }
        return $img;
    }
    
    public static function getThumb($picUrl, $width = 200, $height = 200, $defaultPic = "/statics/images/default.png"){
        if (($picUrl == "") || !file_exists(Yii::getAlias("@wwwdir"  . $picUrl))) {
            //所以说原图不能删除
            $picUrl = $defaultPic;
        }
        //echo $picUrl."fffff";die;
        $pre = '_thumb_';
        preg_match("/(.*)\.(.*)/", $picUrl, $matches);
        if(isset($matches[1]) && isset($matches[2])){
            $thumb = $matches[1].$pre.$width.'x'.$height.'.'.$matches[2];
            if(file_exists(Yii::getAlias("@wwwdir"  . $thumb))){
                return $thumb;
            }else{
                //生成缩略图
                $image = \yii\imagine\Image::thumbnail(Yii::getAlias("@wwwdir"  . $picUrl), $width, $height, \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND);
                $image->save(Yii::getAlias("@wwwdir" . $thumb));
                if(file_exists(Yii::getAlias("@wwwdir"  . $thumb))){
                    return $thumb;
                }
            }
        }
        
        return $picUrl;
    }
    
    protected function getPicName($picUrl){
        $picName = "";
        $ptn = "#^/(.*)/(.*)#";
        preg_match($ptn, $picUrl, $urlarr);
        if(isset($urlarr[1]) && isset($urlarr[2])){
            //$defaultName = explode(".",$urlarr[2]);
            $picName = $urlarr[2];
        }
        return $picName;
    }
    
}
?>

