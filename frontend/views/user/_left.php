<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2016-3-14 22:55:41
 */
?>
    <div class="wrapper-user-l">
        <div class="user-l-tit">个人中心</div>
        <div class="user-l-tx">
            <img src="<?= Yii::$app->user->identity->avatar; ?>" width="103" height="85" alt="" /> 欢迎您<i><?= Yii::$app->user->identity->username; ?></i>
        </div>
        <?php 
        $actionID = Yii::$app->controller->action->id;
        ?>
        <ul class="user-l-body">
            <li>
                <a href="<?= Yii::$app->urlManager->createUrl(['user/index']); ?>"<?php if($actionID == 'basic'){echo ' class="on"';} ?>>
                    <i><img src="/statics/images/user-01.jpg" width="20" height="20" alt=""/></i>
                    <span>基本信息</span>
                </a>
            </li>
            <li>
                <a href="<?= Yii::$app->urlManager->createUrl(['user/change-password']); ?>"<?php if($actionID == 'change-password'){echo ' class="on"';} ?>>
                    <i><img src="/statics/images/user-02.jpg" width="20" height="20" alt=""/></i>
                    <span>修改密码</span>
                </a>
            </li>
            <li>
                <a href="<?= Yii::$app->urlManager->createUrl(['user/course','type'=>0]); ?>"<?php if($actionID == 'course'){echo ' class="on"';} ?>>
                    <i><img src="/statics/images/user-03.jpg" width="20" height="20" alt=""/></i>
                    <span>我的课程</span>
                </a>
            </li>
            <li>
                <a href="<?= Yii::$app->urlManager->createUrl(['user/pinglun']); ?>"<?php if($actionID == 'pinglun'){echo ' class="on"';} ?>>
                    <i><img src="/statics/images/user-04.jpg" width="20" height="20" alt=""/></i>
                    <span>我的评论</span>
                </a>
            </li>
            <li>
                <a href="<?= Yii::$app->urlManager->createUrl(['user/my-video']); ?>"<?php if($actionID == 'my-video'){echo ' class="on"';} ?>>
                    <i><img src="/statics/images/user-05.jpg" width="20" height="20" alt=""/></i>
                    <span>我的上传</span>
                </a>
            </li>
        </ul>
    </div>
