<?php
/**********前台公用函数库***********************/


/**
 * 自定义MD5加密方法
 * @param 加密字符串 $str
 * @param 安全码 $auth_code
 * @return string 加密字符串
 */
function user_md5($str, $auth_code=NULL)
{
    if (!$auth_code) {
        $auth_code = C('AUTH_CODE') ?: 'YIDU';
    }
    return '' === $str ? '' : md5(sha1($str) . $auth_code);
}
/**
 * 检测是否登录
 */
function is_login(){
  return D('Home/User')->is_login();   
}
/**
 * 获取用户真实ip
 * @return string|返回ip地址
 */
function get_proxy_ip()
{
    $arr_ip_header = array(
        'HTTP_CDN_SRC_IP',
        'HTTP_PROXY_CLIENT_IP',
        'HTTP_WL_PROXY_CLIENT_IP',
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED_FOR',
        'REMOTE_ADDR',
    );
    $client_ip = 'unknown';
    foreach ($arr_ip_header as $key)
    {
        if (!empty($_SERVER[$key]) && strtolower($_SERVER[$key]) != 'unknown')
        {
            $client_ip = $_SERVER[$key];
            break;
        }
    }
    return $client_ip;
}

function array_unique_fb($array2D){
    foreach ($array2D as $v){
        $v=join(',',$v); //降维,也可以用implode,将一维数组转换为用逗号连接的字符串
        $temp[]=$v;
    }
    $temp=array_unique($temp); //去掉重复的字符串,也就是重复的一维数组
    foreach ($temp as $k => $v){
        $temp[$k]=explode(',',$v); //再将拆开的数组重新组装
    }
    return $temp;
}