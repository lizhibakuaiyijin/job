<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * [基础控制器]
 * author:[]
 * date:[]
 */
class BaseController extends Controller
{
	/**
	 * [初始化]
	 * @param []
	 * @return []
	 */
	public function __construct()
	{
		parent::__construct();
		//判断是否存在
		if(!session('admin_id')){
			$this->redirect('/Admin/Login/login');
		}
	}
}