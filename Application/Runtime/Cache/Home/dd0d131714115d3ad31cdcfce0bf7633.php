<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>个人信息</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="telephone=no" name="format-detection" />
    <meta content="email=no" name="format-detection" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/stu_job/Public/css/light7.min.css">
    <link rel="stylesheet" href="/stu_job/Public/css/light7-swiper.min.css">
    <style>
        .page {
            background: #fff
        }
        .color-gray.notice{
            color: red;
            font-size: .7rem;
        }
    </style>
</head>

<body>
    <div class="page" id="page">
        <header class="bar bar-nav">
            <a href="index.html" class="pull-left open-panel icon"><span class="icon icon-home"></span></a>
            <h1 class="title">个人信息</h1>
        </header>
        <div class="content" id="app">
            <form>
            <div class="list-block">
                <ul>
                    <li>
                        <div class="item-content">
                            <div class="item-media"><i class="icon icon-form-name"></i></div>
                            <div class="item-inner">
                                <div class="item-title label">用户名</div>
                                <div class="item-input">
                                    <input type="text" value="<?php echo ($info["username"]); ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-content">
                             <div class="item-media"><i class="icon icon-form-name"></i></div>
                            <div class="item-inner">
                                <div class="item-title label">真实姓名</div>
                                <div class="item-input">
                                    <input type="text" value="<?php echo ($info["realname"]); ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-content">
                            <div class="item-media"><i class="icon icon-form-tel"></i></div>
                            <div class="item-inner">
                                <div class="item-title label">手机号</div>
                                <div class="item-input">
                                    <input type="number" value="<?php echo ($info["phone"]); ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-content">
                             <div class="item-media"><i class="icon icon-form-gender"></i></div>
                            <div class="item-inner">
                                <div class="item-title label">性别</div>
                                <div class="item-input">
                                    <input type="text" <?php if($info['sex'] == 1): ?>value="男"<?php else: ?>value="女"<?php endif; ?> readonly>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Date -->
                    <li>
                        <div class="item-content">
                             <div class="item-media"><i class="icon icon-form-calendar"></i></div>
                            <div class="item-inner">
                                <div class="item-title label">入学时间</div>
                                <div class="item-input">
                                    <input type="date" value="<?php echo ($info["admission_date"]); ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-content">
                             <div class="item-media"><i class="icon icon-form-settings"></i></div>
                            <div class="item-inner">
                                <div class="item-title label">学校</div>
                                <div class="item-input">
                                    <input type="text" value="<?php echo ($info["school"]); ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-content">
                             <div class="item-media"><i class="icon icon-form-settings"></i></div>
                            <div class="item-inner">
                                <div class="item-title label">学院</div>
                                <div class="item-input">
                                    <input type="text" value="<?php echo ($info["college"]); ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-content">
                             <div class="item-media"><i class="icon icon-form-settings"></i></div>
                            <div class="item-inner">
                                <div class="item-title label">专业</div>
                                <div class="item-input">
                                    <input type="text" value="<?php echo ($info["major"]); ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            </form>
        </div>
    </div>
</body>
<script type="text/javascript" src="/stu_job/Public/js/jquery-3.2.1.min.js"></script>
<script type='text/javascript' src='/stu_job/Public/js/light7.min.js' charset='utf-8'></script>
<script type='text/javascript' src='/stu_job/Public/js/light7-swiper.min.js' charset='utf-8'></script>
</html>