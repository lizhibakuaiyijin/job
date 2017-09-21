<?php
namespace Admin\Model;

use Think\Model;

/**
 * [职位]
 * author:[]
 * date:[]
 */
class PostModel extends Model
{
    protected $_validate = array(
        array('post_name', 'require', '职位名不能为空！'),
        array('post_tag', 'require', '职位类型不能为空！'),
        array('post_type', 'require', '职位类别不能为空！'),
        array('pay', 'require', '薪资不能为空！'),
        array('address', 'require', '工作地点不能为空！'),
    );

    /**
     * [分页查询]
     * @param []
     * @return []
     */
    public function post_info()
    {
        header("content-type:text/html;charset=utf8");
        $count        = $this->count('post_id');
        $p            = get_page($count, 15);
        $info['data'] = $this->limit($p->firstRow, $p->listRows)->order('date desc')->select();
        foreach ($info['data'] as &$v) {
            $v['province_name'] = M('area')->where(['province_id' => $v['province_id'],'city_id' => 0,'district_id' => 0])->getField('name');
            $v['city_name'] = M('area')->where(['province_id' => $v['province_id'],'city_id' => $v['city_id'],'district_id' => 0])->getField('name');
            $v['district_name'] = M('area')->where(['province_id' => $v['province_id'],'city_id' =>$v['city_id'],'district_id' => $v['district_id']])->getField('name');
        }
        $info['page'] = $p->show();
        return $info;
    }

    /**
     * [职位添加]
     * @param []
     * @return []
     */
    public function post_add($data)
    {
        return $this->add($data);
    }

    /**
     * [职位修改]
     * @param []
     * @return []
     */
    public function post_update($data)
    {
        return $this->where(['post_id' => $data['post_id']])->save($data);
    }

    /**
     * [职位删除]
     * @param []
     * @return []
     */
    public function post_del($post_id)
    {
        return $this->where(['post_id' => $post_id])->delete();
    }
}
