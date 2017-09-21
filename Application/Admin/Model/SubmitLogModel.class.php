<?php
namespace Admin\Model;

use Think\Model;

/**
 * [投递日志]
 * author:[]
 * date:[]
 */
class SubmitLogModel extends Model
{
    /**
     * [查询投递日志]
     * @param []
     * @return []
     */
    public function log_list($post_id = null)
    {
        if (is_null($post_id)) {
            $count        = $this->count('id');
            $p            = get_page($count, 15);
            $info['data'] = $this->limit($p->firstRow, $p->listRows)->order('post_time desc')->select();
            $info['page'] = $p->show();
        }else{
        	$info = $this
                ->alias('l')
                ->join('job_user as u ON l.uid = u.id')
                ->where(['job_id' => $post_id])
                ->order('post_time desc')
                ->select();
        }
        return $info;
    }
}
