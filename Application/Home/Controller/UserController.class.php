<?php
namespace Home\Controller;

class UserController extends BaseController{
    //个人信息
    public function user_info(){
        $user_info=session('user_info');
        $uid=$user_info['uid'];
        $info=D('User')->find($uid);
        $this->assign('info',$info);
        $this->display();
    }
    //投递日志
    public function apply_log(){
        $user_info=session('user_info');
        $uid=$user_info['uid'];
        $job_list= M('submit_log')->where(['uid'=>$uid])->order('post_time desc')->select();
        $this->assign('job_list',$job_list);
        $this->display();
    }
}