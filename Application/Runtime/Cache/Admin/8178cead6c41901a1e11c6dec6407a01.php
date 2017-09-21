<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/stu_job/Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/stu_job/Public/css/bootstrap-datetimepicker.min.css">
    <script src="/stu_job/Public/js/jquery-3.2.1.min.js"></script>
    <script src="/stu_job/Public/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title>添加职位</title>
    <style type="text/css">
    h1 {
        padding: 35px 0 20px;
        text-align: center
    }
    .addwrap {
        margin: 0 auto;
        width: 70%
    }
    .mr {
        margin-right: 10px
    }
    .p-t10 {
        padding: 10px 0 0
    }

    .nav.nav-tabs>li {
        width: 33.3%;
        text-align: center
    }

    .form-group {
        margin-bottom: 20px;
        padding-top: 30px;
        padding-bottom: 30px;
        border: 1px solid #ccc;
        border-radius: 5px
    }

    .d-none {
        display: none
    }

    .error {
        border-color: #ee5757;
        background-color: hsla(0, 7%, 89%, .18)
    }

    .error,
    .pass {
        border-width: 1px
    }

    .pass {
        border-color: #80cbc4;
        background-color: rgba(237, 251, 232, .7)
    }

    .notice {
        position: relative;
        top: 1pc;
        font-size: 1pc
    }

    .notice,
    .red {
        color: #ee5757
    }

    .green {
        color: #80cbc4
    }

    input.wage {
        width: 90px
    }

    .form-horizontal .control-label {
        font-weight: 400
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
    <h1>添加兼职信息</h1>
    <form class="form-horizontal addwrap" enctype="multipart/form-data">
        <div class="form-group jobName">
            <label for="jobName" class="col-sm-2 control-label">职位名称：</label>
            <div class="col-sm-10">
                <input type="text" class="form-control jobName" name="jobNname" placeholder="请输入职位名称">
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-4 notice"></div>
        </div>
        <!--职位名称-->
        <div class="form-group jobType">
            <label class="col-sm-2 control-label">职位类型：</label>
            <div class="col-sm-10 jobType">
                <div class="col-sm-3">
                    <label class="control-label mr">实习 </label>
                    <input type="radio" name="jobType" value="实习">
                </div>
                <div class="col-sm-3">
                    <label class="control-label mr">店员 </label>
                    <input type="radio" name="jobType" value="店员">
                </div>
                <div class="col-sm-3">
                    <label class="control-label mr">展会 </label>
                    <input type="radio" name="jobType" value="展会">
                </div>
                <div class="col-sm-3">
                    <label class="control-label mr">促销 </label>
                    <input type="radio" name="jobType" value="促销">
                </div>
                <div class="col-sm-3">
                    <label class="control-label mr">派发 </label>
                    <input type="radio" name="jobType" value="派发">
                </div>
                <div class="col-sm-3">
                    <label class="control-label mr">推广 </label>
                    <input type="radio" name="jobType" value="推广">
                </div>
                <div class="col-sm-3">
                    <label class="control-label mr">文员 </label>
                    <input type="radio" name="jobType" value="文员">
                </div>
                <div class="col-sm-3">
                    <label class="control-label mr">助教 </label>
                    <input type="radio" name="jobType" value="助教">
                </div>
                <div class="col-sm-3">
                    <label class="control-label mr">客服 </label>
                    <input type="radio" name="jobType" value="客服">
                </div>
                <div class="col-sm-3">
                    <label class="control-label mr">礼仪 </label>
                    <input type="radio" name="jobType" value="礼仪">
                </div>
                <div class="col-sm-3">
                    <label class="control-label mr">翻译 </label>
                    <input type="radio" name="jobType" value="翻译">
                </div>
                <div class="col-sm-3">
                    <label class="control-label mr">充场 </label>
                    <input type="radio" name="jobType" value="充场">
                </div>
                <div class="col-sm-3">
                    <label class="control-label mr">服务员 </label>
                    <input type="radio" name="jobType" value="服务员">
                </div>
                <div class="col-sm-3">
                    <label class="control-label mr">问卷调查 </label>
                    <input type="radio" name="jobType" value="问卷调查">
                </div>
                <div class="col-sm-3">
                    <label class="control-label mr">物流仓储 </label>
                    <input type="radio" name="jobType" value="物流仓储">
                </div>
                <div class="col-sm-3">
                    <label class="control-label mr ml">校园兼职 </label>
                    <input type="radio" name="jobType" value="校园兼职">
                </div>
                <div class="col-sm-3">
                    <label class="control-label mr ml">其他 </label>
                    <input type="radio" name="jobType" value="其他">
                </div>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-2 notice"></div>
        </div>
        <!--职位类型-->
        <div class="form-group jobCater">
            <label class="col-sm-2 control-label">职位类别：</label>
            <div class="col-sm-10">
                <label class="control-label mr">全 职 </label>
                <input type="radio" name="jobCater" value="1">
                <label style="margin-left: 60px" class="control-label mr">兼 职 </label>
                <input type="radio" name="jobCater" value="2">
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-2 notice"></div>
        </div>
        <!--职位类别-->
        <div class="form-group jobWage d-none">
            <div class="full d-none">
                <label for="" class="col-sm-2 control-label">薪资：</label>
                <!--全职-->
                <div class="col-sm-10 fullTime">
                    <div>
                        <label class="control-label mr">按月结算 </label>
                        <input type="radio" style="margin-right: 20px" name="fullWage" value="2">
                    </div>
                    <div class="wage d-none">
                        <div class="col-sm-6 p-t10">
                            <input type="number" class="form-control col-sm-6 wage" />
                            <label class="control-label">&nbsp;每月</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="part d-none">
                <label for="" class="col-sm-2 control-label">薪资：</label>
                <!--兼职-->
                <div class="col-sm-10 partTime">
                    <div class="col-sm-10">
                        <div class="col-sm-4">
                            <label class="control-label mr">按小时结算 </label>
                            <input type="radio" name="partWage" value="0">
                        </div>
                        <div class="col-sm-4">
                            <label class="control-label mr">日 结 </label>
                            <input type="radio" name="partWage" value="1">
                        </div>
                        <div class="col-sm-4">
                            <label class="control-label mr">月 结 </label>
                            <input type="radio" name="partWage" value="2">
                        </div>
                    </div>
                    <div class="wage d-none">
                        <div class="col-sm-6 p-t10">
                            <input type="number" class="form-control col-sm-6 wage" placeholder="薪资" />
                            <label class="control-label"></label>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <label class="col-sm-2"></label>
                <div class="col-sm-2 notice"></div>
            </div>
        </div>
        <!--薪资待遇-->
        <div class="form-group jobTime d-none">
            <label for="" class="col-sm-2 control-label">工作时间：</label>
            <div class="col-sm-10">
                <!--开始时间-->
                <label for="" class="col-md-2">开始时间</label>
                <div class="input-group date form_datetime start col-md-5" data-date-format="yyyy-mm-dd hh:ii" data-link-field="dtp_input1">
                    <input class="form-control starttime" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
                <input type="hidden" id="dtp_input1" value="" />
                <br/>
                <!--结束时间-->
                <div class="endtimeWrap d-none">
                    <label for="" class="col-md-2">结束时间</label>
                    <div class="input-group date form_datetime end col-md-5" data-date-format="yyyy-mm-dd hh:ii" data-link-field="dtp_input1">
                        <input class="form-control endtime" size="16" type="text" value="" readonly>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input1" value="" />
                    <br/>
                </div>
            </div>
            <div>
                <label class="col-sm-2"></label>
                <div class="col-sm-2 notice"></div>
            </div>
        </div><!--工作时间-->
        <div class="form-group jobArea">
            <label style="padding-top: 0" class="col-sm-2 control-label">工作地区：</label>
            <div class="col-sm-10">
                <select id="province">
                    <option value="0">请选择省份</option>
                    <?php if(is_array($info)): foreach($info as $key=>$v): ?><option value="<?php echo ($v['province_id']); ?>"><?php echo ($v['name']); ?></option><?php endforeach; endif; ?>
                </select>
                <select id="city">
                    <option value="0">请选择城市</option>
                </select>
                <select id="district">
                    <option value="0">请选择县/区</option>
                </select>
            </div>
            <div>
                <label class="col-sm-2"></label>
                <div class="col-sm-2 notice"></div>
            </div>
        </div><!-- 工作地区 -->
        <div class="form-group jobAddress">
            <label for="" class="col-sm-2 control-label">工作地点：</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="请输入工作地点">
            </div>
            <div>
                <label class="col-sm-2"></label>
                <div class="col-sm-2 notice"></div>
            </div>
        </div><!--工作地点-->
        <div class="form-group jobDetail">
            <label for="" class="col-sm-2 control-label">职位详情：</label>
            <div class="col-sm-10">
                <textarea id="detail" style="width: 100%;height: 200px;resize: none;" placeholder="请描述职位"></textarea>
            </div>
        </div><!--职位详情-->
        <div class="form-group" style="border: none;">
            <div class="" style="text-align: center;">
                <button type="button" class="btn btn-success btn-lg submit" id="submit">添加</button>
            </div>
        </div>
    </form>
    <script type="text/javascript" src="/stu_job/Public/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/stu_job/Public/js/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
    <script type="text/javascript">
    $(".post_add").addClass("active");
    /************************   日历   ************************/
    $('.form_datetime').datetimepicker({
        language: 'zh-CN',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1,
        minuteStep: 30
    });
    var date = new Date();
    var today = date.toLocaleDateString().replace(/\//g, "-");
    // 开始日期
    $('.form_datetime.start').datetimepicker('setStartDate', today);
    // 选定日期
    $(".form_datetime.start").datetimepicker().on("changeDate", function(ev) {
        // 判断输入框是否有值
        if ($(".starttime").val() == "") {
            $('.endtimeWrap').addClass("d-none");
            $(".endtime").val("");
        } else {
            var endtime = $(".starttime").val().split(" ");
            // 结束日期不得小于开始日期
            $('.form_datetime.end').datetimepicker('setStartDate', endtime[0]);
            $('.endtimeWrap').removeClass("d-none");
        }
    })

    /******************检测*******************/
    var jobName = jobType = jobCater = jobWage = jobTime = jobAddress = jobArea = false;
    // 1  职位名称
    $('input.jobName').blur(function() {
        if ($(this).val().replace(/\s/g, "").length == 0) {
            $(".form-group.jobName").addClass("error");
            $(".form-group.jobName .notice").html("请输入职位名称");
            $(".form-group.jobName").removeClass("pass");
            jobName = false;
        } else {
            $(".form-group.jobName").addClass("pass");
            $(".form-group.jobName .notice").html("")
            $(".form-group.jobName").removeClass("error");
            jobName = true;
        }
    });
    // 2 职位类型
    $('input[name="jobType"]').click(function() {
        if (jobType == false) {
            $(".form-group.jobType").addClass("pass");
            $(".form-group.jobType").removeClass("error");
            $(".form-group.jobType .notice").html("")
            jobType = true;
        }
    })
    // 3 职位类别
    $('input[name="jobCater"]').click(function() {
        if (jobCater == false) {
            $(".form-group.jobCater").addClass("pass");
            $(".form-group.jobCater").removeClass("error");
            $(".form-group.jobCater .notice").html("");
            jobCater = true;
            // 显示薪资
            $(".form-group.jobWage").removeClass("d-none");
        }
        $(".form-group.jobWage").removeClass("error");
        if ($('input[name="jobCater"]:checked').val() == 2) { // 兼职
            // 切换
            $(".part").removeClass("d-none");
            $(".full").addClass("d-none");
            $(".form-group.jobTime").removeClass("d-none");
            $(".form-group.jobTime .notice").html("");
            $(".form-group.jobTime").removeClass("error");
            // 是否填写完整
            if ($(".partTime input.wage").val() == "") {
                jobWage = false;
                $(".form-group.jobWage .notice").html("");
                $(".form-group.jobWage").removeClass("pass");
            } else {
                jobWage = true;
                $(".form-group.jobWage").addClass("pass");
            }
        } else if ($('input[name="jobCater"]:checked').val() == 1) { // 全职
            // 切换
            $(".full").removeClass("d-none");
            $(".part").addClass("d-none");
            $(".form-group.jobTime").addClass("d-none");
            // 是否填写完整
            if ($(".fullTime input.wage").val() == "") {
                jobWage = false;
                $(".form-group.jobWage .notice").html("");
                $(".form-group.jobWage").removeClass("pass");
            } else {
                jobWage = true;
                $(".form-group.jobWage").addClass("pass");
            }
        }
    })
    // 4 薪资
    $('input[name="fullWage"]').click(function() {
        if ($('input[name="fullWage"]:checked').val() == "2") {
            $(".fullTime div.wage").removeClass("d-none");
        }
    })
    $('input[name="partWage"]').click(function() {
        $(".partTime div.wage").removeClass("d-none");
        if ($('input[name="partWage"]:checked').val() == "2") {
            $(".partTime div.wage label").html("&nbsp;每月")
        } else if ($('input[name="partWage"]:checked').val() == "1") {
            $(".partTime div.wage label").html("&nbsp;每日")
        } else if ($('input[name="partWage"]:checked').val() == "0") {
            $(".partTime div.wage label").html("&nbsp;每小时")
        }
    })
    $(".fullTime input.wage").blur(function() {
        judgeWage(this);
    })
    $(".partTime input.wage").blur(function() {
        judgeWage(this);
    })
    // 判断
    function judgeWage(t) {
        if ($(t).val() == "") {
            $(".form-group.jobWage").addClass("error");
            $(".form-group.jobWage .notice").html("请输入薪资");
            $(".form-group.jobWage").removeClass("pass");
            jobWage = false;
        } else {
            $(".form-group.jobWage").addClass("pass");
            $(".form-group.jobWage .notice").html("")
            $(".form-group.jobWage").removeClass("error");
            jobWage = true;
        }
    }
    // 5 工作区域
    var IsProvince = IsCity = IsDistrict = false;
            $("#province").change(function () {
                jobArea = false;
                $(".form-group.jobArea").removeClass("pass");
                if ($("#province option:selected").val() != 0) {
                    IsProvince = true;
                    IsCity = false;
                    IsDistrict = false;
                }else {
                    IsProvince = false;
                    IsCity = false;
                    IsDistrict = false;
                }
            })
            $("#city").change(function () {
                jobArea = false;
                $(".form-group.jobArea").removeClass("pass");
                if ($("#city option:selected").val() != 0) {
                    IsCity = true;
                    IsDistrict = false;
                }else {
                    IsCity = false;
                    IsDistrict = false;
                }
            })
            $("#district").change(function () {
                if ($("#district option:selected").val() != 0) {
                    if (!IsDistrict) {
                        IsDistrict = true; 
                        $(".form-group.jobArea").addClass("pass");
                        $(".form-group.jobArea").removeClass("error");
                        $(".form-group.jobArea .notice").html("")
                        jobArea = true;
                    }
                }else {
                    IsDistrict = false; 
                    $(".form-group.jobArea").removeClass("pass");
                }
            })
    // 6 工作地点
    $(".jobAddress input").blur(function() {
        if ($(this).val().replace(/\s/g, "").length == 0) {
            $(".form-group.jobAddress").addClass("error");
            $(".form-group.jobAddress .notice").html("请输入工作地点");
            $(".form-group.jobAddress").removeClass("pass");
            jobAddress = false;
        } else {
            $(".form-group.jobAddress").addClass("pass");
            $(".form-group.jobAddress .notice").html("")
            $(".form-group.jobAddress").removeClass("error");
            jobAddress = true;
        }
    })

    /************************   提交   ************************/
    $("#submit").click(function() {
        // 职位名称
        if (!jobName) {
            $(".form-group.jobName").addClass("error");
            $(".form-group.jobName .notice").html("请输入职位名称");
            $(".form-group.jobName").removeClass("pass");
        }
        // 职位类型
        if (!jobType) {
            $(".form-group.jobType .notice").html("请选择职位类型");
            $(".form-group.jobType").addClass("error");
        }
        // 职位类别
        if (!jobCater) {
            $(".form-group.jobCater .notice").html("请选择职位类别");
            $(".form-group.jobCater").addClass("error");
        }
        // 薪资
        if (!jobWage) {
            $(".form-group.jobWage .notice").html("请输入薪资");
            $(".form-group.jobWage").addClass("error");
        }
        // 时间
        if ($('input[name="jobCater"]:checked').val() == 2) {
            if ($(".endtimeWrap .endtime").val() == "") {
                $(".form-group.jobTime .notice").html("请选择工作时间");
                $(".form-group.jobTime").addClass("error");
                jobTime = false;
            } else {
                $(".form-group.jobTime .notice").html("");
                $(".form-group.jobTime").addClass("pass");
                $(".form-group.jobTime").removeClass("error");
                jobTime = true;
            }
        } else {
            jobTime = true;
        }
        // 地区
        if (!jobArea) {
            $(".form-group.jobArea").addClass("error");
            $(".form-group.jobArea .notice").html("请选择地区");
        }
        // 地点
        if (!jobAddress) {
            $(".form-group.jobAddress").addClass("error");
            $(".form-group.jobAddress .notice").html("请输入工作地点");
        }
        // 要传输的数据
        var post_name = post_type = post_tag = pay_type = pay = start_time = end_time = address = post_detail = province_id = city_id = district_id = null;
        if (jobName == true && jobType == true && jobCater == true && jobWage == true && jobTime == true && jobAddress == true && jobArea == true) {
            post_name = $('input.jobName').val();
            post_tag = $('input[name="jobType"]:checked').val();
            post_type = $('input[name="jobCater"]:checked').val();
            // 全职 兼职
            if ($('input[name="jobCater"]:checked').val() == 1) {
                pay_type = $('input[name="fullWage"]:checked').val();
                pay = $(".fullTime input.wage").val();
            } else if ($('input[name="jobCater"]:checked').val() == 2) {
                pay_type = $('input[name="partWage"]:checked').val()
                pay = $(".partTime input.wage").val()
                start_time = $(".starttime").val();
                end_time = $(".endtime").val();
            }
            address = $(".jobAddress input").val();
            post_detail = $("#detail").val();
            province_id = $("#province option:selected").val();
            city_id = $("#city option:selected").val();
            district_id = $("#district option:selected").val();
            $.ajax({
                url: "<?php echo U('post/post_add');?>",
                type: "post",
                dataType: "json",
                data: {
                    post_name,
                    post_type,
                    post_tag,
                    pay_type,
                    pay,
                    start_time,
                    end_time,
                    address,
                    post_detail,
                    province_id,city_id,district_id
                },
                async: true,
                success: function(data) {
                    if (data.status > 0) {
                        //弹出框
                        alert('添加成功！');
                        //跳转
                        window.location.href = "<?php echo U('Post/post_list');?>";
                    }
                },
            })
        }
    })

    $('#province').change(function() {
        var province_id = $('#province option:selected').attr('value');
        var url = "<?php echo U('Post/city');?>";
        var html = '';
        $.post(url, { province_id: province_id }, function(result) {
            $('#city').children('option').remove();
            // 所有的option元素删除后，再加上一个初始的option
            $("#city").append("<option value='0'>请选择城市</option>");

            $('#district').children('option').remove();
            // 所有的option元素删除后，再加上一个初始的option
            $("#district").append("<option value='0'>请选择县/区</option>");
            // 循环读出，输出信息到新加的option上
            for (var i = 0; i <= result.info.length; i++) {
                $("#city").append("<option value='" + result.info[i].city_id + "'>" + result.info[i].name + "</option>");
            }
        });
    });

    
    $('#city').change(function() {
        var city_id = $('#city option:selected').attr('value');
        var url = "<?php echo U('Post/district');?>";
        var html = '';
        $.post(url, { city_id: city_id }, function(result) {
            $('#district').children('option').remove();
            // 所有的option元素删除后，再加上一个初始的option
            $("#district").append("<option value='0'>请选择县/区</option>");
            // 循环读出，输出信息到新加的option上
            for (var i = 0; i <= result.info.length; i++) {
                $("#district").append("<option value='" + result.info[i].district_id + "'>" + result.info[i].name + "</option>");
            }
        });
    });
    </script>
</body>