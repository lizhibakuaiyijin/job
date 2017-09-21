<?php
namespace Admin\Controller;

use Think\Controller;

/**
 * [投递日志]
 * author:[]
 * date:[]
 */
class SubmitLogController extends BaseController
{
    /**
     * [日志列表]
     * @param []
     * @return []
     */
    public function log_list()
    {
        //实例化
        $Log = D('SubmitLog');
        //查询
        $info = $Log->log_list();
        //分配数据
        $this->assign('info', $info);
        //页面展示
        $this->display();
    }

    /**
     * [职位申请人列表]
     * @param []
     * @return []
     */
    public function apply_list()
    {
        //实例化
        $Log = D('SubmitLog');
        //获取要查询的职位id
        $post_id = I('get.post_id');
        //查询
        $info = $Log->log_list($post_id);
        // dump($Log->_sql());
        // dump($info);
        // exit;
        //分配数据
        $this->assign('info',$info);
        //页面展示
        $this->display('log/apply_list');
    }
}
