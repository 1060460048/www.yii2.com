<?php
/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-30 17:47:31
 */
$this->registerJsFile('@web/statics/js/jquery.banner.revolution.min.js',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('@web/statics/js/banner.js',['depends'=>['frontend\assets\AppAsset']]);
?>
<!-- banner start -->
<div id="wrapper">
	<div class="fullwidthbanner-container">
		<div class="fullwidthbanner">
			<ul class="bannerul">
                <?php foreach ($slider as $k => $v): ?>
				<li data-transition="3dcurtain-horizontal" data-slotamount="15" data-masterspeed="300" >
                    <img src="<?= $v->thumb; ?>" data-url="<?= $v->url; ?>" alt="<?= $v->intro; ?>" />				
				</li>
                <?php endforeach; ?>			
			</ul>
		</div>
	</div>
</div>
<!-- banner end -->