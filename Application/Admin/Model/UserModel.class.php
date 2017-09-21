<?php
namespace Admin\Model;

use Think\Model;

/**
 * [用户]
 * author:[]
 * date:[]
 */
class UserModel extends Model
{
	/**
	 * [用户信息]
	 * @param []
	 * @return []
	 */
	public function user_info()
	{
		$count = $this->count('id');
		$p = get_page($count,15);
		//查询信息
		$info['data'] = $this->limit($p->firstRow,$p->listRows)->select();
		$info['page'] = $p->show();
		//返回数据
		return $info;
	}
}