<?php
namespace Admin\Model;

use Think\Model;

/**
 * [decription]
 * author:[]
 * date:[]
 */
class AdminModel extends Model
{
    protected $_validate = [
        [],
    ];

    /**
     * [分页查询数据]
     * @param []
     * @return []
     */
    public function admin_info()
    {
        $count        = $this->count('admin_id');
        $p            = get_page($count, 5);
        $info['data'] = $this->limit($p->firstRow, $p->listRows)->select();
        $info['page'] = $p;
        return $info;
    }

    /**
     * [修改密码]
     * @param []
     * @return []
     */
    public function pwd_edit($data)
    {
        return $this->where(['admin_id' => $data['admin_id']])->save($data);
    }

    /**
     * [添加]
     * @param []
     * @return []
     */
    public function admin_add($data)
    {
        return $this->add($data);
    }

    /**
     * [删除]
     * @param []
     * @return []
     */
    public function admin_del($admin_id)
    {
        return $this->where($admin_id)->delete();
    }
}
