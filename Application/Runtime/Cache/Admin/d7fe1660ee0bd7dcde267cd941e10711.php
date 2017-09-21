<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>登录</title>
	<meta name="renderer" content="webkit">
	<script src="/stu_job/Public/js/jquery-3.2.1.min.js"></script>
	<link href="/stu_job/Public/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
	html, body { height: 100%; overflow: hidden; }
	body {
	    font-family: "Verdana", "Tahoma", "Lucida Grande", "Microsoft YaHei", "Hiragino Sans GB", sans-serif;
	    background: url(/stu_job/Public/img/loginbg.jpg) no-repeat center center fixed;
	    background-size: cover;
	}
	.form-control{height:37px;}
	.main_box{position:absolute; top:45%; left:50%; margin:-200px 0 0 -180px; padding:15px 20px; width:360px; height:400px; min-width:320px; background:#FAFAFA; background:rgba(255,255,255,0.5); box-shadow: 1px 5px 8px #888888; border-radius:6px;}
	.login_msg{height:30px;}
	.input-group >.input-group-addon.code{padding:0;}
	#captcha_img{cursor:pointer;}
	.main_box .logo img{height:35px;}
	.form-group{
		margin-bottom: 30px;
	}
	.text-center.login{
		padding-top: 50px;
	}
	.form-control.name,.form-control.psd{
		height: 50px;
	}
    /**/
    .error{
        border: 2px solid #EE5757;
        border-radius: 5px;
    }
    .pass{
        border: 2px solid #80cbc4;
        border-radius: 5px;
    }
    .notice{
        position: relative;
        top: 16px;
        font-size: 16px;
        color: #EE5757;
    }
	@media (min-width: 768px) {
	    .main_box {margin-left:-240px; padding:15px 55px; width:480px;}
	    .main_box .logo img{height:40px;}
	}

	</style>
</head>
<body>
<!--[if lte IE 7]>
<style type="text/css">
#errorie {position: fixed; top: 0; z-index: 100000; height: 30px; background: #FCF8E3;}
#errorie div {width: 900px; margin: 0 auto; line-height: 30px; color: orange; font-size: 14px; text-align: center;}
#errorie div a {color: #459f79;font-size: 14px;}
#errorie div a:hover {text-decoration: underline;}
</style>
<div id="errorie"><div>您还在使用老掉牙的IE，请升级您的浏览器到 IE8以上版本 <a target="_blank" href="http://windows.microsoft.com/zh-cn/internet-explorer/ie-8-worldwide-languages">点击升级</a>&nbsp;&nbsp;强烈建议您更改换浏览器：<a href="http://down.tech.sina.com.cn/content/40975.html" target="_blank">谷歌 Chrome</a></div></div>
<![endif]-->
<div class="container">
    <div class="main_box">
        <form id="login_form">
            <input type="hidden" value="" id="j_randomKey" />
            <input type="hidden" name="jfinal_token" value="" />
            <!-- 企业logo -->
            <p class="text-center logo"><img src="" height="45"></p>
            <div class="login_msg text-center"><font color="red"></font></div>
            <div class="form-group username">
                <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon-user"><span class="glyphicon glyphicon-user"></span></span>
                    <input type="text" class="form-control name" id="j_username" name="username" value="" placeholder="登录账号" aria-describedby="sizing-addon-user">
                </div>
                <div class="notice"></div>
            </div>
            <div class="form-group password">
                <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon-password"><span class="glyphicon glyphicon-lock"></span></span>
                    <input type="password" class="form-control psd" id="j_password" name="passwordhash" placeholder="登录密码" aria-describedby="sizing-addon-password">
                </div>
                <div class="notice"></div>
            </div>
            <!-- 验证码 -->
            <!-- <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon-password"><span class="glyphicon glyphicon-exclamation-sign"></span></span>
                    <input type="text" class="form-control" id="j_captcha" name="captcha" placeholder="验证码" aria-describedby="sizing-addon-password">
                    <span class="input-group-addon code" id="basic-addon-code"><img id="captcha_img" src="images/captcha.jpg" alt="点击更换" title="点击更换" class="m"></span>
                </div>
            </div> -->
            <!-- 记住账号功能 -->
            <!-- <div class="form-group">
                <div class="checkbox">
                    <label for="j_remember" class="m"><input id="j_remember" type="checkbox" value="true">&nbsp;记住登陆账号!</label>
                </div>
            </div> -->
            <div class="text-center login">
                <button type="button" id="login_ok" class="btn btn-primary btn-lg">&nbsp;登&nbsp;录&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;
               <!--  <button type="reset" class="btn btn-default btn-lg">&nbsp;重&nbsp;置&nbsp;</button> -->
            </div>
            <div class="text-center">
                <!-- <hr> -->
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $("#j_password").blur(function () {
        $(".password .notice").html("");
        if ($(this).val() == "") {
            $("#login_ok").prop("disabled",true);
        } else {
            $("#login_ok").prop("disabled",false);
        }
    })
    $("#j_username").blur(
        function () {
            if ($(this).val() == "") {
                $(".username .notice").html("请填写登录名");
                $(".form-group.username .input-group").removeClass("pass");
                $(".form-group.username .input-group").addClass("error");
            }else {
                $("#login_ok").prop("disabled",true);
                $.ajax({
                    url: "<?php echo U('Login/check_name');?>",
                    type: "post",
                    dataType: "json",
                    data: {
                        admin_name: $("#j_username").val(),
                    },
                    success: function (data) {
                        if (data.status == 1) {
                            $("#login_ok").prop("disabled",false);
                            $(".username .notice").html("");
                            $(".form-group.username .input-group").removeClass("error");
                            $(".form-group.username .input-group").addClass("pass");
                        }else if(data.status == 0){
                            $("#login_ok").prop("disabled",true);
                            $(".username .notice").html("该用户不存在");
                            $(".form-group.username .input-group").removeClass("pass");
                            $(".form-group.username .input-group").addClass("error");
                        }
                    }
                })
                 
            }
        })
    $("#login_ok").click(function () {
        $("#login_ok").prop("disabled",true);
        $.ajax({
            url: "<?php echo U('Login/login');?>",
            type: "post",
            dataType: "json",
            data: {
                admin_name: $("#j_username").val(),
                admin_pwd: $("#j_password").val()
            },
            success: function (data) {
                if (data.status == 1) {
                    // 跳转
                    window.location.href = "<?php echo U('Post/post_list');?>"
                } else {
                    $(".password .notice").html(data.msg);
                    $("#login_ok").prop("disabled",false);
                }
            }
        })
    })
</script>
</body>
</html>