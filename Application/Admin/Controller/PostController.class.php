<?php
namespace Admin\Controller;

use Think\Controller;

/**
 * [职位]
 * author:[]
 * date:[]
 */
class PostController extends BaseController
{
    /**
     * [description]
     * @param []
     * @return []
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * [职位发布列表]
     * @param []
     * @return []
     */
    public function post_list()
    {
        //实例化对象
        $Post = D('post');
        //查询数据
        $info = $Post->post_info();
        //分配数据
        $this->assign('info', $info);
        //页面展示
        $this->display();
    }

    /**
     * [发布职位]
     * @param []
     * @return []
     */
    public function post_add()
    {
        //实例化对象
        $Post = D('Post');
        if (IS_POST) {
            //获取提交的数据
            $data = I('post.');
            $data['start_time'] = strtotime($data['start_time']);
            $data['end_time'] = strtotime($data['end_time']);
            //验证数据
            if (!$Post->create($data)) {
                $this->ajaxReturn(['status' => 0, 'msg' => $Post->getError()]);
            }
            //添加数据
            $data['date'] = time();
            // dump($data);
            // exit;
            $result = $Post->post_add($data);
            //返回数据
            if (!$result) {
                $this->ajaxReturn(['status' => 0, 'msg' => '添加失败，请稍后重试']);
            }
            $this->ajaxReturn(['status' => 1, 'msg' => '添加成功！']);
        } else {
            //查询省份
            $info = $this->province();
            //数据分配
            $this->assign('info', $info);
            //页面展示
            $this->display();
        }
    }

    /**
     * [修改职位]
     * @param []
     * @return []
     */
    public function post_edit()
    {
        header('Content-type:text/html;charset=utf8');
        //实例化对象
        $Post = D('post');
        $Area = M('area');
        //获取提交的职位id
        $post_id = I('get.post_id');
        //查询数据
        $info = $Post->where(['post_id' => $post_id])->find();
        $info['city_info'] = $Area->where(['province_id' => $info['province_id'],'city_id' => ['neq',0],'district_id' => 0])->select();
        // dump($info['city_info']);
        // exit;
        $info['district_info'] = $Area->where(['city_id' => $info['city_id'],'district_id' => ['neq',0]])->select();
        //查询省份
        $area = $this->province();
        // dump($info);
        // exit;
        //分配数据
        $this->assign([
            'info' => $info,
            'area' => $area
        ]);
        //页面展示
        $this->display();
    }

    /**
     * [修改职位处理]
     * @param []
     * @return []
     */
    public function post_update()
    {
        //实例化对象
        $Post = D('post');
        //获取要修改的职位信息
        $data = I('post.');
        // dump($data);
        // exit;
        //修改发布时间
        $data['date'] = time();
        $data['start_time'] = strtotime($data['start_time']);
        $data['end_time'] = strtotime($data['end_time']);
        if(!$Post->create($data)){
            $this->ajaxReturn(['status' => 0,'msg' => $Post->getError()]);
        }
        //提交修改
        $result = $Post->post_update($data);
        // dump($Post->_sql());
        // dump($result);
        // exit;
        if (!$result) {
            $this->ajaxReturn(['status' => 0, 'msg' => '系统出错，请稍后重试']);
        }
        $this->ajaxReturn(['status' => 1, 'msg' => '修改成功']);
    }

    /**
     * [职位删除]
     * @param []
     * @return []
     */
    public function post_del()
    {
        $Post = D('post');
        //获取要删除的职位id
        $post_id = I('post.post_id');
        //删除职位
        $result = $Post->post_del($post_id);
        // dump($result);
        // exit;
        if (!$result) {
            $this->ajaxReturn(['status' => 0, 'msg' => '删除失败，请稍后重试']);
        }
        $this->ajaxReturn(['status' => 1, 'msg' => '删除成功！']);
    }

    /**
     * [查询省]
     * @param []
     * @return []
     */
    public function province()
    {
        header('Content-type:text/html;charset=utf8');
        //实例化
        $Area = M('area');
        //查询数据
        $info = $Area->where(['city_id' => 0,'district_id' => 0])->field('name,id,province_id,city_id,district_id')->select();
        // dump($info);
        // exit;
        return $info;
    }

    /**
     * [城市]
     * @param []
     * @return []
     */
    public function city()
    {
        //实例化对象
        $Area = M('area');
        //获取提交的省份id
        $province_id = I('post.province_id');
        //查询市
        $info = $Area->where(['province_id' => $province_id,'city_id' => ['neq',0],'district_id' => 0])->field('name,id,province_id,city_id,district_id')->select();
        $this->ajaxReturn(['info' => $info]);
    }

    /**
     * [县区]
     * @param []
     * @return []
     */
    public function district()
    {
        //实例化对象
        $Area = M('area');
        //获取提交的省份id
        $city_id = I('post.city_id');
        //查询市
        $info = $Area->where(['city_id' => $city_id,'district_id' => ['neq', 0]])->field('name,id,province_id,city_id,district_id')->select();
        $this->ajaxReturn(['info' => $info]);
    }
}
