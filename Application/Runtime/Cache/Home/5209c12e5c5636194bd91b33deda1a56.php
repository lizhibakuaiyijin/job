<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title><?php echo ($info["post_name"]); ?></title>
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta content="telephone=no" name="format-detection" />
<meta content="email=no" name="format-detection" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="stylesheet" type="text/css" href="/stu_job/Public/css/index.css">
<link rel="stylesheet" href="/stu_job/Public/css/light7.min.css">
<link rel="stylesheet" href="/stu_job/Public/css/light7-swiper.min.css">
<style>
.bar .icon {
	font-size: 1.4rem;
}

.card {
	margin: 0 0 .5rem 0
}

.card-header, .card-footer {
	flex-direction: column;
	align-items: flex-start;
}

.card h3 {
	margin: 0 auto
}

.d-mes {
	width: 100%;
	font-size: .7rem;
	padding-top: .9rem;
	padding-bottom: .3rem;
}

.d-detail .row {
	padding: .2rem 0;
}

.d-detail .col-30 {
	color: #757575;
}

.d-label {
	background-color: rgba(236, 237, 239, .41);
	border-radius: .2rem;
	border: 1px solid #ccc;
	padding: .25rem
}

.color-red {
	color: red;
}
</style>
</head>

<body>
	<div class="page" id="page">
		<header class="bar bar-nav">
			<a href="javascript:history.go(-1)"
				class="pull-left open-panel icon icon-left"></a>
			<h1 class="title">职位详情</h1>
		</header>
		<?php if($is_apply == 1): ?><nav class="bar bar-tab"
			style="background-color: rgba(8, 148, 236, 0.86)">
			<a class="tab-item active" href="#">
			 <span	class="tab-label button-round btn" style="color: #fff; font-size: 1.2rem" onclick="apply_job(<?php echo ($info["post_id"]); ?>)"> 
			 	立即报名
			 </span>
			 <input type="hidden" name="salt" id="salt" value="<?php echo ($apply_salt); ?>">
			</a>
		</nav>
		<?php else: ?>
		<nav class="bar bar-tab"
			style="background-color: #81C784">
			<a class="tab-item active" href="#"> <span
				class="tab-label button-round btn"
				style="color: #fff; font-size: 1.2rem"> 已投递该职位 </span>
			</a>
		</nav><?php endif; ?>
		<div class="content">
			<div class="card">
				<div class="card-header">
					<h3><?php echo ($info["post_name"]); ?></h3>
					<div class="color-gray d-mes row">
						<div class="col-33">
							<span class="d-label"><?php if($info['post_type'] == 1): ?>全职 <?php else: ?> 兼职<?php endif; ?></span>
						</div>
						<div class="col-33">
							<span class="d-label"><?php echo ($info["post_tag"]); ?></span>
						</div>
						<div class="col-33">
							<span class="d-label"><?php echo ($district_name); ?></span>
						</div>

					</div>
				</div>
				<div class="card-content">
					<div class="card-content-inner">
						<div class="content-padded grid-demo d-detail">
							<div class="row">
								<div class="col-30">职位类型：</div>
								<div class="col-70">
									<?php if($info['post_type'] == 1): ?>全职 <?php else: ?> 兼职<?php endif; ?>
								</div>
							</div>
							<div class="row">
								<div class="col-30">薪资待遇：</div>
								<div class="col-70 color-red"><?php echo ($info["salary"]); ?></div>
							</div>
							<div class="row">
								<div class="col-30">职位分类：</div>
								<div class="col-70"><?php echo ($info["post_tag"]); ?></div>
							</div>
							<div class="row">
								<div class="col-30">发布时间：</div>
								<div class="col-70"><?php echo date('Y-m-d H:i:s',$info['date']);?></div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-content">
					<div class="card-content-inner">
						<div class="content-padded grid-demo">
							<div class="row">
								<div class="col-30">工作地点：</div>
								<div class="col-70"><?php echo ($info["address"]); ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-content">
					<div class="card-content-inner">
						<div class="content-padded grid-demo">
							<div class="row">
								<div class="col-30">工作日期：</div>
								<div class="col-70"><?php echo date('Y-m-d
									H:i:s',$info['start_time']);?> 至 <?php echo date('Y-m-d
									H:i:s',$info['end_time']);?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header color-red">工作详情</div>
				<div class="card-content">
					<div class="card-content-inner" style="line-height: 2"><?php echo ($info["post_detail"]); ?></div>
				</div>
			</div>
			<div class="card">
				<div class="card-header color-red">注意事项</div>
				<div class="card-content">
					<div class="card-content-inner" style="line-height: 2">
					谨慎报名，不放鸽子。<br/>
					一切先交钱的兼职都是骗人的。<br/>
					报名成功之后，我们会有人联系你的。
					</div>
				</div>
			</div>
</body>
<script type='text/javascript' src='/stu_job/Public/js/jquery-3.2.1.min.js'
	charset='utf-8'></script>
<script type='text/javascript' src='/stu_job/Public/js/light7.min.js'
	charset='utf-8'></script>
<script type='text/javascript' src='/stu_job/Public/js/light7-swiper.min.js'
	charset='utf-8'></script>
<script type="text/javascript" src="/stu_job/Public/js/vue.min.js"></script>
<script type="text/javascript" src="/stu_job/Public/js/infinite-scroll.js"></script>
<script type="text/javascript">
	function apply_job(){
		var salt=$('#salt').val();
		var job_id="<?php echo ($info["post_id"]); ?>";
		var job_name="<?php echo ($info["post_name"]); ?>";
		var job_type="<?php echo ($info["post_type"]); ?>";
		var begin_time="<?php echo ($info["start_time"]); ?>";
		var end_time="<?php echo ($info["end_time"]); ?>";
		var salary="<?php echo ($info["salary"]); ?>";	
		var url="<?php echo U('job/apply_job');?>";
		var data={
			"salt":salt,
			"job_id":job_id,
			"job_name":job_name,
			"job_type":job_type,
			"begin_time":begin_time,
			"end_time":end_time,
			"salary":salary
		};
		$.post(url,data,function(res){
			if(res.code == '10000'){
				alert(res.msg);
				window.location.href="<?php echo U('index/index');?>";
			}else{
				alert(res.msg);
				location.reload();
			}
		});
	}
</script>
</html>