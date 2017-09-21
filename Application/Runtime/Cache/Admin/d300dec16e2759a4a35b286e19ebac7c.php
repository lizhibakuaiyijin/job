<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <title>兼职</title>
    <link rel="stylesheet" href="/stu_job/Public/css/bootstrap.min.css">
    <script src="/stu_job/Public/js/jquery-3.2.1.min.js"></script>
    <script src="/stu_job/Public/js/bootstrap.min.js"></script>
    <style>
    .panel-info>.panel-heading {
        height: 40px;
    }

    .pages a,
    .pages span {
        display: inline-block;
        padding: 2px 5px;
        margin: 0 1px;
        border: 1px solid #f0f0f0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }

    .pages a,
    .pages li {
        display: inline-block;
        list-style: none;
        text-decoration: none;
        color: #58A0D3;
    }

    .pages a.first,
    .pages a.prev,
    .pages a.next,
    .pages a.end {
        margin: 0;
    }

    .pages a:hover {
        border-color: #50A8E6;
    }

    .pages span.current {
        background: #50A8E6;
        color: #FFF;
        font-weight: 700;
        border-color: #50A8E6;
    }

    .right {
        float: right;
    }

    .left {
        float: left;
    }

    .builder-container {
        margin-top: 1px;
    }

    .text {
        height: 30px;
        width: 180px;
    }

    .button {
        height: 30px;
        width: 40;
    }
    </style>
</head>

<body>
    <header>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" style="width: 100%">
                    <li>
                        <a><span><?php echo ($_SESSION['admin_name']); ?></span>，欢迎登录！</a>
                    </li>
                    <li class="post_list">
                        <a href="<?php echo U('Post/post_list');?>">职位列表</a>
                    </li>
                    <li class="post_add">
                        <a href="<?php echo U('Post/post_add');?>">添加信息</a>
                    </li>
                    <li class="user_list">
                        <a href="<?php echo U('User/user_list');?>">用户列表</a>
                    </li>
                    <li class="logout" style="float: right;">
                        <a href="#" onclick="logout()">退出登录</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script type="text/javascript">
    function logout() {
        var log = confirm('确认退出？');
        if (log) {
            window.location.href = "<?php echo U('Login/logout');?>";
        }
    }
    </script>
</header>
    <div class="container" style="min-width: 1200px">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>用户列表</h1></div>
            <!-- Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th>姓名</th>
                        <th>真实姓名</th>
                        <th>性别</th>
                        <th>入学时间</th>
                        <th>学校</th>
                        <th>联系方式</th>
                        <th>注册时间</th>
                        <th>上次登录时间</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($info['data'])): foreach($info['data'] as $key=>$v): ?><tr>
                            <td><?php echo ($v['username']); ?></td>
                            <td><?php echo ($v['realname']); ?></td>
                            <td>
                                <?php if($v['sex'] == 1): ?>男
                                    <?php else: ?> 女<?php endif; ?>
                            </td>
                            <td><?php echo ($v['admission_date']); ?></td>
                            <td><?php echo ($v['school']); ?></td>
                            <td><?php echo ($v['phone']); ?></td>
                            <td><?php echo (date("Y-m-d H:i:s",$v['reg_time'])); ?></td>
                            <td><?php echo (date("Y-m-d H:i:s",$v['last_login_time'])); ?></td>
                        </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
        <div>
            <div class="pages">
                <?php echo ($info['page']); ?>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(".user_list").addClass("active");
</script>
</html>