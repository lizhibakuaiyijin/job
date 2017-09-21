<?php
namespace Home\Controller;
use Think\Controller;
/**
 * 前台基类控制器
 * @author shiyi
 *
 */
class BaseController extends Controller{
    //登录状态检测
    public function _initialize(){
        if(!is_login()){
           //$this->error('请您先登录',U('Public/login'),1);
            redirect(U('Public/login'));
        }
    }
}