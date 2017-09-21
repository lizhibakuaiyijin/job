<?php
//加密函数
function pass_encrypt($password)
{
    //盐
    $salt = 'yidu';
    //加密字符串
    $str = base64_encode(crypt($password, $salt));
    return $str;
}

//分页
function get_page($count, $pagesize = 10)
{
    //实例化对象
    $p = new Think\Page($count, $pagesize);
    //设置参数
    $p->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录 第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
    $p->setConfig('prev', '<<');
    $p->setConfig('next', '>>');
    $p->setConfig('last', '末页');
    $p->setConfig('first', '首页');
    $p->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
    $p->lastSuffix = false; //最后一页不显示为总页数
    return $p;
}
