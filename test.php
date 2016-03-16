<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2016-3-16 15:27:20
 */
?>
<?php 
$str = <<< str
        <p style="line-height: 16px;">
        <img style="vertical-align: middle; margin-right: 2px;" src="http://jianyang.yifei100.com/backend/web/assets/9c7b827b/dialogs/attachment/fileTypeImages/icon_doc.gif"/>
            
   <a style="font-size:12px; color:#0066cc;" href="/upload/file/20160316/1458104404932357.doc" title="网站排版.doc">网站排版.doc</a>
        </p>
str;
$ptnIco = '/<img.*?src=".*?attachment\/fileTypeImages.*?".*?>/';
$ptn = '/<a.*? href="\/upload\/file\/(.*?)".*?a>/';
preg_match_all($ptnIco, $str, $matches);
$str = preg_replace($ptnIco, "", $str);
preg_match_all($ptn, $str, $matches);
$str = preg_replace($ptn, "", $str);
echo $str;
//var_dump($matches);

?>

