
<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use backend\widgets\Alert;


/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title."_网站管理后台") ?></title>
    <?php $this->head() ?>
</head>
<body class="theme-darkblue">
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?= $this->render('//layouts/top-menu.php') ?>

        <div class="container">
            <section class="all">
                <section class="content-left">
                <div id="left" class="ui-sortable ui-resizable">
					<nav class="bs-docs-sidebar">
						
                        <a id="drop1" href="#collapseOne" data-toggle="collapse" aria-expanded="true"><h4>首页<b class="caret"></h4></b></a>
                            <ul id="collapseOne" aria-expanded="true" class="collapse in">
                              <li><a tabindex="-1" href="/backend/web/">后台首页</a></li>
<!--                              <li><a tabindex="-1" href="#">Another action</a></li>
                              <li><a tabindex="-1" href="#">Something else here</a></li>
                              <li><a tabindex="-1" href="#">Separated link</a></li>-->
                            </ul>
                        
					</nav>
                </div>
                </section>
                <section class="right">
                    <section class="content-header">
                        
                        <?= Breadcrumbs::widget([
                            'homeLink'=>['label'=>'首页','url'=>yii\helpers\Url::to(['site/index']),'template'=>'<li><i class="glyphicon glyphicon-home"></i>{link}</li>'],
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>
                    </section>
                    <?= Alert::widget() ?>
                    <section class="content">
                        <?= $content ?>
                    </section>
                </section>
            </section>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy;  <?= date('Y') ?>由河南亿飞网络科技有限公司提供技术支持 </p>
        <!--<p class="pull-right"><?= Yii::powered() ?></p>-->
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
