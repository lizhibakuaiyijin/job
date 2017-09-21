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
    .right{
        float:right;
    }
    .left{
        float:left;
    }
    .builder-container{
        margin-top:1px;
    }
    .text{
        height:30px;
        width:180px;
    }
    .button{
        height:30px;
        width:40;
    }
    .w15{
        width: 15%;
    }
    .w20{
        width: 20%;
    }
    .w8{
        width: 8%;
    }
    .w5{
        width: 5%;
    }
    td{
        max-height: 150px;
    }
    th,td{
        text-align: center;
        vertical-align: middle !important;
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
                <h1>职位列表</h1></div>
            <!-- Table -->
            <table class="table">
                <thead>
                    <tr style="text-align: center;">
                        <th class="w15">职位名称</th>
                        <th class="w8">职位类型</th>
                        <th class="w8">职位类别</th>
                        <th class="w5">薪资</th>
                        <th class="w8">工作地区</th>
                        <th class="w8">工作地点</th>
                        <th class="w20">职位详情</th>
                        <th class="w8">投递人数</th>
                        <th class="w5">修改</th>
                        <th class="w5">删除</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($info['data'])): foreach($info['data'] as $key=>$v): ?><tr>
                            <td><?php echo ($v['post_name']); ?></td>
                            <td><?php echo ($v['post_tag']); ?></td>
                            <td>
                                <?php if($v["post_type"] == 1): ?>全职
                                    <?php else: ?>
                                    兼职<?php endif; ?>
                            </td>
                            <td><?php echo ($v['pay']); ?>/
                                <?php switch($v['pay_type']): case "0": ?>小时<?php break;?>
                                    <?php case "1": ?>天<?php break;?>
                                    <?php case "2": ?>月<?php break; endswitch;?>
                            </td>
                            <td>
                                <div><?php echo ($v['province_name']); ?></div>
                                <div><?php echo ($v['city_name']); ?></div>
                                <div><?php echo ($v['district_name']); ?></div>
                            </td>
                            <td><?php echo ($v['address']); ?></td>
                            <td><?php echo ($v['post_detail']); ?></td>
                            <td><a href="<?php echo U('SubmitLog/apply_list',['post_id' => $v['post_id']]);?>"><?php echo ($v['count']); ?></a></td>
                            <td><a href="<?php echo U('Post/post_edit',['post_id' => $v['post_id']]);?>">修改</a></td>
                            <td><a onclick="del(<?php echo ($v['post_id']); ?>)">删除</a></td>
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
    <script type="text/javascript">
    $(".post_list").addClass("active");
    function del(id) {
        var notice = confirm("您确定要删除这条信息吗？");
        if (!notice) {

        } else {
            $.ajax({
                url: "<?php echo U('Post/post_del');?>",
                type: "post",
                dataType: "json",
                data: {post_id:id},
                success: function(data) {
                    alert(data.msg);
                    location.reload();
                }
            })
        }
    }
    </script>
</body>

</html>