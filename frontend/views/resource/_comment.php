<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2016-3-14 16:35:54
 */
foreach ($models as $k=>$v):
?>
<div class="collegecomments-body-zt">
    <img src="<?php if($v->user){echo $v->user->avatar;}else{echo "/statics/images/img_126.jpg";} ?>" width="103" height="85" alt=""/> 
    <div class="collegecomments-body-zt-r">
        <div class="collegecomments-mc"><?php if($v->user){echo $v->user->username;}else{echo "未知";} ?><span><?= date("Y-m-d",$v->created_at); ?></span></div>
        <div class="collegecomments-zt-nr"><?= $v->content; ?></div>
    </div>
</div>
<?php endforeach; ?>

<?php echo $this->render('/layouts/_pagination',['pagination'=>$pagination]); ?>
