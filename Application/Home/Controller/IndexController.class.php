<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller{
    protected $unique_city=[
        '110100'=>'北京市',
        '120100'=>'天津市',
        '500100'=>'重庆市',
        '310100'=>'上海市'       
    ];
   public function index(){
       //城市列表
       $city_list=$this->city_list();
       //没有设置城市时，默认为上海
       if(!session('city')){
           session('city',['city_id'=>'310100','name'=>'上海市']);
       }    
       $this->assign('city_list',$city_list);
       //查询当前城市下的工作
       $city=session('city');
       $city_id=$city['city_id'];
       $job_list=$this->get_city_job($city_id);
      
       $this->assign('job_list',$job_list);
       $this->display();
   }
   
   //城市列表
   public function city_list(){
       
       $city_list = D('Admin/Post')->field('city_id')->select();      
       $city_list=array_unique_fb($city_list);  
       $unique_city=$this->unique_city;
       
       $area_model=M('area');
       $new_city_list=[];
       foreach($city_list as &$v){
           $city_name=$unique_city[$v[0]];
           if(!$city_name){
               $city_name= $area_model->where(array('city_id'=>$v[0]))->getField('name');
           }
           $new_city_list[]=['city_name'=>$city_name,'city_id'=>$v[0]];
       }
       return $new_city_list;    
   }
   //根据城市获取职位列表
   public function get_city_job($city_id){
      // $city_id=I('get.city_id');
       $job_list=D('Admin/Post')->field('post_id,post_name,post_tag,district_id,date,pay')->where(['city_id'=>$city_id])->order('date desc')->select();
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
       return $job_list;
   }
}