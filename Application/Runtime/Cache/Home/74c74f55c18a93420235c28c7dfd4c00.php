<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<title>兼职</title>
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta content="telephone=no" name="format-detection" />
<meta content="email=no" name="format-detection" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="stylesheet" href="/stu_job/Public/css/light7.min.css">
<!-- <link rel="stylesheet" href="css/light7-swiper.min.css"> -->
<style>
.d-bl {
	display: block;
}

.bar .searchbar {
	background: 0 0
}

.small p {
	margin: .5em 0;
	font-size: .7em
}

.d-swiper img {
	width: 100%;
	height: 6rem
}

.card {
	margin: .65rem
}

.infinite-scroll-preloader {
	margin-top: -20px
}

.d-label {
	background-color: rgba(236, 237, 239, .41);
	border-radius: .2rem;
	border: 1px solid #ccc;
	padding: .1rem
}

.row.d-option {
	text-align: center
}

.row.d-option>div {
	padding-top: .5rem
}

.row.d-option a {
	color: #000
}

.popup-overlay.modal-overlay-visible {
	display: none
}

.popup-overlay {
	background: 0 0
}

.type div.item-media img {
	border-radius: 50%
}

.type .list-block .item-content {
	padding-right: .3rem
}
</style>
</head>
<body>
	<div class="page">
		<!--头部-->
		<header class="bar bar-nav row">
			<div class="col-15">
				<button id="goback" class="close-popup button pull-left open-popup"
					onclick="javascript:history.go(-1)">返回</button>
			</div>
			<div class="col-85 row d-option">
				<div class="col-33 open-popup" data-popup=".popup-type"
					onclick="change(this)">
					<a class="">职位</a>
				</div>
				<div class="col-33 center open-popup" data-popup=".popup-cater"
					onclick="change(this)">
					<a class="">类型</a>
				</div>
				<div class="col-33 open-popup" data-popup=".popup-wage"
					onclick="change(this)">
					<a class="">薪资</a>
				</div>
			</div>
		</header>
		<!--弹出层-->
		<div class="popup popup-city content">
			<div class="content-block">
				<div class="list-block inset">
					<ul>
						<!--城市-->
						<li><a href="#" class="item-link list-button">List Button
								1</a></li>
						<li><a href="#" class="item-link list-button">List Button
								1</a></li>
						<li><a href="#" class="item-link list-button">List Button
								1</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="popup popup-me content">
			<div class="content-block">
				<div class="list-block inset">
					<ul>
						<li><a href="register.html" class="item-link list-button">注册</a></li>

					</ul>
				</div>
			</div>
		</div>
		<div class="popup popup-type content">
			<div class="content-block">
				<div class="list-block inset">
					<ul>
						<li><a
							href="<?php echo U('job/job_search',array('type'=>'tag','tag'=>'实习'));?>"
							class="external item-link list-button">实习</a></li>
						<li><a
							href="<?php echo U('job/job_search',array('type'=>'tag','tag'=>'店员'));?>"
							class="external item-link list-button">店员</a></li>
						<li><a
							href="<?php echo U('job/job_search',array('type'=>'tag','tag'=>'展会'));?>"
							class="external item-link list-button">展会</a></li>
						<li><a
							href="<?php echo U('job/job_search',array('type'=>'tag','tag'=>'促销'));?>"
							class="external item-link list-button">促销</a></li>
						<li><a
							href="<?php echo U('job/job_search',array('type'=>'tag','tag'=>'派发'));?>"
							class="external item-link list-button">派发</a></li>
						<li><a
							href="<?php echo U('job/job_search',array('type'=>'tag','tag'=>'推广'));?>"
							class="external item-link list-button">推广</a></li>
						<li><a
							href="<?php echo U('job/job_search',array('type'=>'tag','tag'=>'文员'));?>"
							class="external item-link list-button">文员</a></li>
						<li><a
							href="<?php echo U('job/job_search',array('type'=>'tag','tag'=>'助教'));?>"
							class="external item-link list-button">助教</a></li>
						<li><a
							href="<?php echo U('job/job_search',array('type'=>'tag','tag'=>'客服'));?>"
							class="external item-link list-button">客服</a></li>
						<li><a
							href="<?php echo U('job/job_search',array('type'=>'tag','tag'=>'礼仪'));?>"
							class="external item-link list-button">礼仪</a></li>
						<li><a
							href="<?php echo U('job/job_search',array('type'=>'tag','tag'=>'翻译'));?>"
							class="external item-link list-button">翻译</a></li>
						<li><a
							href="<?php echo U('job/job_search',array('type'=>'tag','tag'=>'充场'));?>"
							class="external item-link list-button">充场</a></li>
						<li><a
							href="<?php echo U('job/job_search',array('type'=>'tag','tag'=>'服务员'));?>"
							class="external item-link list-button">服务员</a></li>
						<li><a
							href="<?php echo U('job/job_search',array('type'=>'tag','tag'=>'问卷调查'));?>"
							class="external item-link list-button">问卷调查</a></li>
						<li><a
							href="<?php echo U('job/job_search',array('type'=>'tag','tag'=>'物流仓储'));?>"
							class="external item-link list-button">物流仓储</a></li>
						<li><a
							href="<?php echo U('job/job_search',array('type'=>'tag','tag'=>'校园兼职'));?>"
							class="external item-link list-button">校园兼职</a></li>
						<li><a
							href="<?php echo U('job/job_search',array('type'=>'tag','tag'=>'其他'));?>"
							class="external item-link list-button">其他</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="popup popup-cater content">
			<div class="content-block">
				<div class="list-block inset">
					<ul>
						<li><a
							href="<?php echo U('job/job_search',array('type'=>'type','post_type'=>1));?>"
							class="external item-link list-button">全职</a></li>
						<li><a
							href="<?php echo U('job/job_search',array('type'=>'type','post_type'=>2));?>"
							class="external item-link list-button">兼职</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="popup popup-wage content">
			<div class="content-block">
				<div class="list-block inset">
					<ul>
						<li><a
							href="<?php echo U('job/job_search',array('type'=>'pay','pay_type'=>1));?>"
							class="external item-link list-button">按小时结算</a></li>
						<li><a
							href="<?php echo U('job/job_search',array('type'=>'pay','pay_type'=>1));?>"
							class="external item-link list-button">日结</a></li>
						<li><a
							href="<?php echo U('job/job_search',array('type'=>'pay','pay_type'=>1));?>"
							class="external item-link list-button">月结</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- 中间内容 -->

		<div class="content">
			<div class="page-index">
			<?php if(!empty($job_list)): if(is_array($job_list)): foreach($job_list as $key=>$v): ?><div class="card first">				
					<a href="<?php echo U('job/detail',array('id'=>$v['post_id']));?>" class="external d-bl">
						<div class="card-content">
							<div class="list-block media-list">
								<ul>
									<li class="item-content">
										<div class="item-inner small">
											<div class="item-title-row">
												<div class="item-title"><?php echo ($v["post_name"]); ?></div>
											</div>
											<p class="color-gray">
												<span>工作地点：<span><?php echo ($v["district_name"]); ?></span></span> <span
													class="pull-right d-label"><?php echo ($v["post_tag"]); ?></span>
											</p>
											<div>
												<p class="color-danger pull-left"><?php echo ($v["salary"]); ?></p>
												<p class="color-gray pull-right">
													发布于 <span><?php echo ($v["date"]); ?></span>
												</p>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</a>
				</div><?php endforeach; endif; ?>
			  <?php else: ?>
			  <div class="card">
					 <div class="card-content">
						 <div class="list-block media-list">
							 <ul>			
								 <li class="item-content">
									<span style="margin: 0 auto">当前检索条件没有职位，请选择其他检索条件</span>
								 </li>
							 </ul>
						 </div>
					 </div>
				 </div><?php endif; ?>
			</div>
		</div>
	</div>

	<script type='text/javascript' src='/stu_job/Public/js/jquery-3.2.1.min.js'
		charset='utf-8'></script>
	<script type='text/javascript' src='/stu_job/Public/js/light7.min.js'
		charset='utf-8'></script>
	<!-- <script type="text/javascript" src="js/infinite-scroll.js"></script> -->
	<script type="text/javascript">
		function change() {
			/*
			 if(t.id != "goback"){
			     $("#city").css("display","none");
			     $("#goback").css("display","block");
			 }else{
			     $("#city").css("display","block");
			     $("#goback").css("display","none");
			 }
			*/
		}
		$.init();
		// $(".swiper-container").swiper({});
	</script>
</body>
</html>