<?php
namespace Home\Controller;

/**
 * 前台职位控制器
 * @author shiyi
 *
 */
class JobController extends BaseController{
    protected $unique_city=[
        '110100'=>'北京市',
        '120100'=>'天津市',
        '500100'=>'重庆市',
        '310100'=>'上海市'
    ];
    //全部职位列表  
    public function job_list(){
        $info=D('Admin/Post')->field('post_id,post_name,post_tag,district_id,date,pay')->select();
        $area_model=M('area');
        foreach ($info as &$v){
            $v['district_name']=$area_model->where(array('district_id'=>$v['district_id']))->getField('name');
            if($v['pay_type'] == 0){
                $v['salary']=$v['pay'].'元/时';
            }elseif($v['pay_type'] == 1){
                $v['salary']=$v['pay'].'元/天';
            }elseif($v['pay_type'] == 2){
                $v['salary']=$v['pay'].'元/月';
            }   
            $v['date']=date('Y-m-d',$v['date']);
            //删除无用字段 
            unset($v['district_id']);
            unset($v['pay']);
        }   
       $this->ajaxReturn($info);
    }
    //根据城市筛选职位
    public function get_city_job(){
        $city_id=I('get.city_id');
        $job_list=D('Admin/Post')->field('post_id,post_name,post_tag,district_id,date,pay')->where(['city_id'=>$city_id])->select();
        $area_model=M('area');
        foreach ($job_list as &$v){
            $v['district_name']=$area_model->where(array('district_id'=>$v['district_id']))->getField('name');
            if($v['pay_type'] == 0){
                $v['salary']=$v['pay'].'元/时';
            }elseif($v['pay_type'] == 1){
                $v['salary']=$v['pay'].'元/天';
            }elseif($v['pay_type'] == 2){
                $v['salary']=$v['pay'].'元/月';
            }
            $v['date']=date('Y-m-d',$v['date']);
            //删除无用字段
            unset($v['district_id']);
            unset($v['pay']);
        } 
    }
    //获取数据表里的职位所属的城市列表
    public function get_city(){
       $city_list = D('Admin/Post')->field('city_id')->select();
       $city_list=array_unique($city_list);     
       $area_model=M('area');
       foreach($city_list as &$v){
         $v['city_name']= $area_model->where(array('city_id'=>$v['city_id']))->getField('name');
       }
    }
    //职位详情页
    public function detail(){
        $id=I('get.id');
        $info=D('Admin/Post')->find($id);
        //投递salt
        $apply_salt=uniqid();
        session('apply_salt',$apply_salt);
        //判断当前用户是否投递过该职位
        $user_info=session('user_info');
        $uid=$user_info['uid'];
        $res=M('submit_log')->where(['uid'=>$uid,'job_id'=>$id])->order('id desc')->find();
        if($res){
            if($info['end_time'] == $res['work_end_time']){
                $is_apply=0;
            }else{
                $is_apply=1;
            }
        }else{
            $is_apply=1;
        }
        //薪资拼接
        if($info['pay_type'] == 0){
            $info['salary']=$info['pay'].'元/时';
        }elseif($info['pay_type'] == 1){
            $info['salary']=$info['pay'].'元/天';
        }elseif($info['pay_type'] == 2){
            $info['salary']=$info['pay'].'元/月';
        }
        //工作地点拼接
        $area_model=M('area');
        $province_name=$area_model->where(['province_id'=>$info['province_id']])->getField('name');
        $city_name=$area_model->where(['city_id'=>$info['city_id']])->getField('name');
        $district_name=$area_model->where(['district_id'=>$info['district_id']])->getField('name');
        $info['address']=$province_name.$city_name.$district_name.$info['address'];
       
        
        $this->assign([
            'apply_salt'=>$apply_salt,
            'info'=>$info,
            'is_apply'=>$is_apply,
            'district_name'=>$district_name
        ]);
        $this->display();
    }
    //投递action
    public function apply_job(){
        //判断是否非法投递请求
        if(isset($_POST['salt']) && $_POST['salt'] == session('apply_salt')){
            $user_info=session('user_info');
            $data=[
                'uid'=>$user_info['uid'],
                'job_id'=>I('post.job_id'),
                'job_name'=>I('post.job_name'),
                'post_time'=>time(),
                'job_type'=>I('post.job_type'),
                'work_begin_time'=>I('post.begin_time'),
                'work_end_time'=>I('post.end_time'),
                'salary'=>I('post.salary')
            ];
            //入库
            $res1= M('submit_log')->add($data);
            //更新职位，投递人数
            $res2=D('Admin/Post')->where(['post_id'=>I('post.job_id')])->setInc('count',1);
            if($res1 && $res2){
                $this->ajaxReturn(['code'=>'10000','msg'=>'报名成功,稍后会有人联系你的哦']);
            }else{
                $this->ajaxReturn(['code'=>'40000','msg'=>'好像次元壁破了,您的报名没有成功，可以再试一下哦(#^.^#)']);
            }          
        }else{
            $this->error('非法投递请求');
        }               
    }
    
    //设置城市
    public function set_city(){
        $city_id=I('get.city_id');
        $unique_city=$this->unique_city;
        $city_name=$unique_city[$city_id];
        if($city_name){
            $city_info=['city_id'=>$city_id,'name'=>$city_name];
        }else{
            $city_info=M('area')->field('name,city_id')->where(['city_id'=>$city_id])->find();
        }
        session('city',$city_info);
        redirect(U('Index/index'));
    }
    
    //检索
    public function job_search(){
        
        //当前城市
        $city=session('city');
        $city_id=$city['city_id'];
        //判断检索条件
        $type=I('get.type');
        if($type == 'tag'){
            $tag=I('get.tag');
            $where=['city_id'=>$city_id,'post_tag'=>$tag];         
        }elseif($type == 'type'){
            $type=I('get.post_type');
            $where=['city_id'=>$city_id,'post_type'=>$type]; 
        }elseif($type == 'pay'){
            $pay=I('get.pay_type');
            $where=['city_id'=>$city_id,'pay_type'=>$pay];
        } 
        $area_model=M('area');
        $job_list=D('Admin/Post')->where($where)->order('date desc')->select();
        foreach ($job_list as &$v){
            $v['district_name']=$area_model->where(array('district_id'=>$v['district_id']))->getField('name');
            if($v['pay_type'] == 0){
                $v['salary']=$v['pay'].'元/时';
            }elseif($v['pay_type'] == 1){
                $v['salary']=$v['pay'].'元/天';
            }elseif($v['pay_type'] == 2){
                $v['salary']=$v['pay'].'元/月';
            }
            $v['date']=date('Y-m-d',$v['date']);
            //删除无用字段
            unset($v['district_id']);
            unset($v['pay']);
        }
        $this->assign('job_list',$job_list);
        $this->display('job_list');
    }
}
