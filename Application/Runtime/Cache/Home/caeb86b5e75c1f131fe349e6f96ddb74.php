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
    <div class="">
        <form id="login_form" method="post" action="/stu_job/Public/login.html">
            <input type="hidden" value="" id="j_randomKey" />
            <input type="hidden" name="jfinal_token" value="" />
            <p class="text-center logo"><img src="" height="45"></p>
            <div class="login_msg text-center"><font color="red"></font></div>
            <div class="form-group username">
                <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon-user"><span class="glyphicon glyphicon-user"></span></span>
                    <input type="text" class="form-control name" id="username" name="username" value="" placeholder="登录账号用户名/手机号" aria-describedby="sizing-addon-user">
                </div>
                <div class="notice"></div>
            </div>
            <div class="form-group password">
                <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon-password"><span class="glyphicon glyphicon-lock"></span></span>
                    <input type="password" class="form-control psd" id="password" name="password" placeholder="登录密码" aria-describedby="sizing-addon-password">
                </div>
                <div class="notice"></div>
            </div>
            <div class="text-center login">
                <button  style="background-color: #0894ec" type="submit" id="login_ok" class="btn btn-primary btn-lg">&nbsp;登&nbsp;录&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;                      
                <button  type="button" onclick="register()" class="btn btn-danger btn-lg">&nbsp;注&nbsp;册&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
        </form>
    </div>
    <script type="text/javascript">
     function register(){
    	 window.location.href="<?php echo U('Public/register');?>";
     }
    </script>
</div>
</body>
</html>