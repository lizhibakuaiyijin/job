<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<title>投递日志</title>
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
.apply_log {
	height: 2.2rem;
	line-height: 2.2rem;
	text-align: center;
}
</style>
</head>
<body>
	<div class="page">
		<!--头部-->
		<header class="bar bar-nav row">
			<div class="col-25">
				<button id="goback" class="close-popup button pull-left open-popup"
					onclick="javascript:window.location.href='/index.php'">返回首页</button>
			</div>
			<div class="apply_log col-50">
					<span>投递记录</span> 				
			</div>
		</header>					
		<!-- 中间内容 -->
		<div class="content">
			<div class="page-index">
			<?php if(!empty($job_list)): if(is_array($job_list)): foreach($job_list as $key=>$v): ?><div class="card first">				
					<a href="<?php echo U('job/detail',array('id'=>$v['job_id']));?>" class="external d-bl">
						<div class="card-content">
							<div class="list-block media-list">
								<ul>
									<li class="item-content">
										<div class="item-inner small">
											<div class="item-title-row">
												<div class="item-title"><?php echo ($v["job_name"]); ?></div>
											</div>
											<p class="color-gray">
												<span>工作开始时间：<span><?php echo date('Y-m-d H:i:s',$v['work_begin_time']);?></span></span>
												<br/> 
												<span>工作结束时间：<span><?php echo date('Y-m-d H:i:s',$v['work_end_time']);?></span></span> 
											</p>
											<div>
												<p class="color-danger pull-left"><?php echo ($v["salary"]); ?></p>
												<p class="color-gray pull-right">
													投递时间 <span><?php echo date('Y-m-d H:i:s',$v['post_time']);?></span>
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
									<span style="margin: 0 auto">您还没有投递过职位哦！(#^.^#)</span>
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