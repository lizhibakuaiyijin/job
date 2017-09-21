<?php
namespace Admin\Controller;

use Think\Controller;

/**
 * [登录]
 * author:[]
 * date:[]
 */
class LoginController extends Controller
{
    /**
     * [登录]
     * @param []
     * @return []
     */
    public function login()
    {
        //实例化对象
        $Admin = D('Admin');
        //获取提交的数据
        if (IS_POST) {
            //获取提交的数据
            $data = I('post.');
            //验证用户名和密码
            $result = $this->check_pwd($data['admin_name'], $data['admin_pwd']);
            if (!$result) {
                $this->ajaxReturn(['status' => 0, 'msg' => '用户名与密码不符']);
            }
            //将用户信息存入session
            $admin_id = $Admin->where(['admin_name' => $data['admin_name']])->getField('admin_id');
            session('admin_name',$data['admin_name']);
            session('admin_id',$admin_id);
            $this->ajaxReturn(['status' => 1, 'msg' => '登录成功']);
        }else{
            $this->display();
        }
    }

    /**
     * [判断用户是否存在]
     * @param []
     * @return []
     */
    public function check_name()
    {
        //实例化对象
        $Admin = D('admin');
        //获取提交的数据
        $admin_name = I('post.admin_name');
        //查询用户是否存在
        $result = $Admin->where(['admin_name' => $admin_name])->find();
        if (!$result) {
            $this->ajaxReturn(['status' => 0, 'msg' => '用户名不存在！']);
        }
        $this->ajaxReturn(['status' => 1]);
    }

    /**
     * [验证密码]
     * @param []
     * @return []
     */
    public function check_pwd($admin_name, $admin_pwd)
    {
        //实例化对象
        $Admin = D('admin');
        //查询数据库
        $password = $Admin->where(['admin_name' => $admin_name])->getField('admin_pwd');
        if (pass_encrypt($admin_pwd) != $password) {
            return false;
        }
        return true;
    }

    /**
     * [description]
     * @param []
     * @return []
     */
    public function test()
    {
        /*$result = $this->check_pwd('admin','123456');
        dump($result);
        dump(session('admin_id'));*/
        $str = '#7eu@DmM';
        $pwd = pass_encrypt($str);
        dump($pwd);
    }

    /**
     * [退出]
     * @param []
     * @return []
     */
    public function logout()
    {
        //删除session
    	session('admin_id',null);
    	$this->redirect('/Admin/login/login');
    }
}
