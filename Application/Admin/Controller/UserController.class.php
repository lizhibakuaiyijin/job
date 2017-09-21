<?php
namespace Admin\Controller;

use Think\Controller;

/**
 * [用户]
 * author:[]
 * date:[]
 */
class UserController extends BaseController
{
	/**
	 * [用户列表]
	 * @param []
	 * @return []
	 */
	public function user_list()
	{
		header("content-type:text/html;charset=utf8");
		//实例化
		$User = D('user');
		//查询数据
		$info = $User->user_info();
		//分配数据
		$this->assign('info', $info);
		//页面展示
		$this->display();
	}
}