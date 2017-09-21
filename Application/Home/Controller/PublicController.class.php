<?php
namespace Home\Controller;

use Think\Controller;

/**
 * 登录，注册操作
 * 前台唯一不需要验证登录状态的控制器
 * @author shiyi       
 */
class PublicController extends Controller
{
    // 登录
    public function login()
    {   
        if(IS_POST){
            $username = I('post.username');
            $password = I('post.password');
            $user_model = D('user');
            $user_info = $user_model->login($username, $password);
            if ($user_info) {
                // 校验成功
                // 设置登录状态
                $uid = $user_model->auto_login($user_info);
                // 跳转
                if ($uid > 0 && $user_info['id'] == $uid) {
                    $this->success('登录成功', U('Index/index'));
                }
            } else {
                // 登录失败
                $this->error($user_model->getError());
            }
        }else{
            $this->display();
        }
        
    }

    // 注册
    public function register()
    {
        if (IS_POST) {
            if (isset($_POST['salt']) && $_POST['salt'] == session('salt')) {
                $user_model = D('User');
                $data = $user_model->create();
                if ($data) {
                    $uid = $user_model->filter('strip_tags')->add($data);
                    if ($uid) {
                        //注册成功后，设置成登录状态
                        $user_info=[
                            'uid'=>$uid,
                            'username'=>$data['username'],
                            'realname'=>$data['realname'],
                            'phone'=>$data['phone']
                        ];
                        session('user_info',$user_info);
                        //清除注册salt
                        session('salt',null);
                        $this->success('注册成功', U('Index/index'));
                    } else {
                        $this->error('注册失败,请重试');
                    }
                } else {
                    $this->error($user_model->getError());
                }
            } else {
                // 非法注册
                $this->error('非法注册请求');
            }
        } else {
            $salt = uniqid();
            session('salt', $salt);
            $this->assign('salt', $salt);
            $this->display();
        }
    }

    // 退出登录
    public function logout()
    {
        session(null);
        $this->success('退出成功！', U('index/index'));
    }
   
    //检查注册用户名是否已存在
    public function check_user(){
        $username=I('post.username');
        $result=D('User')->where(array('username'=>$username))->find();
        if($result){
            $this->ajaxReturn(['code'=>'40001','msg'=>'该用户名'.$username.'已被注册！请换一个重试']);
        }else{
            $this->ajaxReturn(['code'=>'10000','msg'=>'该用户名可以注册！']);
        }
    }
    
    //检查注册手机号是否已存在
    public function check_phone(){
        $phone=I('post.phone');
        $result=D('User')->where(array('phone'=>$phone))->find();
        if($result){
            $this->ajaxReturn(['code'=>'40001','msg'=>'该手机号'.$phone.'已被注册！请换一个重试']);
        }else{
            $this->ajaxReturn(['code'=>'10000','msg'=>'该手机号可以注册！']);
        }
    }
}