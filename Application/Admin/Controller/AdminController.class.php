<?php
namespace Admin\Controller;

use Think\Controller;

/**
 * [管理员]
 * author:[]
 * date:[]
 */
class AdminController extends BaseController
{
    /**
     * [管理员列表]
     * @param []
     * @return []
     */
    public function admin_list()
    {
        //实例化对象
        $Admin = D('Admin');
        //分页查询
        $info = $Admin->admin_info();
        //分配数据
        $this->assign('info', $info);
        //页面展示
        $this->display();
    }

    /**
     * [添加管理员]
     * @param []
     * @return []
     */
    public function admin_add()
    {
        //实例化对象
        $Admin = D('Admin');
        //获取提交的数据
        $data = I('post.');
        //验证
        if (!$Admin->create($data)) {
            $this->ajaxReturn(['status' => 0, 'msg' => $Admin->getError()]);
        }
        //验证通过
        $data['admin_pwd'] = pass_encrypt($data['admin_pwd']);
        $result            = $Admin->admin_add($data);
        if (!$result) {
            $this->ajaxReturn(['status' => 0, 'msg' => '添加失败，请稍后重试']);
        }
        $this->ajaxReturn(['status' => 1, 'msg' => '添加成功!']);
    }
    
    /**
     * [修改密码]
     * @param []
     * @return []
     */
    public function pwd_edit()
    {
        //实例化
        $Admin = D('Admin');
        //获取数据
        $data              = I('post.');
        $data['admin_pwd'] = pass_encrypt($data['admin_pwd']);
        //修改数据
        $result = $Admin->pwd_edit($data);
        if (!$reuslt) {
            $this->ajaxReturn(['status' => 0, 'msg' => '修改失败，请稍后重试']);
        }
        $this->ajaxReturn(['status' => 1, 'msg' => '修改成功，请重新登录！']);
    }

    /**
     * [验证旧密码]
     * @param []
     * @return []
     */
    public function check_old_pwd()
    {
        //实例化对象
        $Admin = D('Admin');
        //获取数据
        $data = I('post.');
        //查询数据
        $old_pwd = $Admin->where(['admin_id' => $data['admin_id']])->getField('admin_pwd');
        //判断
        if (pass_encrypt($data['old_pwd']) != $old_pwd) {
            $this->ajaxReturn(['status' => 0, 'msg' => '旧密码错误，请重新填写']);
        }
        $this->ajaxReturn(['status' => 1]);
    }

    /**
     * [删除管理员]
     * @param []
     * @return []
     */
    public function admin_del()
    {
        //实例化
        $Admin = D('Admin');
        //获取id
        $admin_id = I('post.admin_id');
        //删除
        $result = $Admin->admin_del($admin_id);
        if (!$result) {
            $this->ajaxReturn(['status' => 0, 'msg' => '删除失败，请稍后重试']);
        }
        $this->ajaxReturn(['status' => 1, 'msg' => '删除成功！']);
    }
}
