<?php
namespace Home\Model;
use  Think\Model;
/**
 * 前台用户模型
 * @author shiyi
 */
class UserModel extends Model{
    
    //数据库表名    
    protected $tableName = 'user';
      
    //自动验证规则    
    protected $_validate = array(
        //验证用户名
        array('username', 'require', '用户名不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        array('username', '2,32', '用户名长度为2-32个字符', self::MUST_VALIDATE, 'length', self::MODEL_BOTH),
        array('username', '', '用户名被占用', self::MUST_VALIDATE, 'unique', self::MODEL_BOTH),
        array('username', '/^(?!_)(?!\d)(?!.*?_$)[\w]+$/', '用户名只可含有数字、字母、下划线且不以下划线开头结尾，不以数字开头！', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        
        //验证真实姓名
        array('realname', 'require', '真实姓名不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        array('realname', '2,5', '真实姓名长度为2-5个汉字', self::MUST_VALIDATE, 'length', self::MODEL_BOTH),     
        array('realname', '/^[\x{4e00}-\x{9fa5}]+$/u', '请输入中文姓名！', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        
        //验证密码
        array('password', 'require', '密码不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_INSERT),
        array('password', '6,30', '密码长度为6-30位', self::MUST_VALIDATE, 'length', self::MODEL_INSERT),
        array('password', '/(?!^(\d+|[a-zA-Z]+|[~!@#$%^&*()_+{}:"<>?\-=[\];\',.\/]+)$)^[\w~!@#$%^&*()_+{}:"<>?\-=[\];\',.\/]+$/', '密码至少由数字、字母、特殊字符三种中的两种组成', self::MUST_VALIDATE, 'regex', self::MODEL_INSERT),
        array('repassword', 'password', '两次输入的密码不一致', self::EXISTS_VALIDATE, 'confirm', self::MODEL_INSERT),
              
        //验证手机号码
        array('phone', '/^1\d{10}$/', '手机号码格式不正确', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
        array('phone', '', '手机号被占用', self::EXISTS_VALIDATE, 'unique', self::MODEL_BOTH),
              
    );
    //自动完成规则
    protected $_auto = array(
        array('last_login_ip', 'get_proxy_ip', self::MODEL_BOTH, 'function', 1),
        array('password', 'user_md5', self::MODEL_BOTH, 'function'),
        array('reg_time', 'time', self::MODEL_INSERT, 'function'),
        array('last_login_time', 'time', self::MODEL_BOTH, 'function'),      
    );
    
    //用户登录      
    public function login($username, $password, $map = null)
    {
        //去除前后空格
        $username = trim($username);      
        //匹配登录方式
        if (preg_match("/^1\d{10}$/", $username)) {
            $map['phone'] = array('eq', $username); // 手机号登陆
        } else {
            $map['username'] = array('eq', $username); // 用户名登陆
        }
        //查找用户
        $user_info     = $this->where($map)->find(); 
        if (!$user_info) {
            $this->error = '用户不存在';
        } else {
            if (user_md5($password) !== $user_info['password']) {
                $this->error = '密码错误！';
            } else {
                return $user_info;
            }
        }
        return false;
    }         
  
    //设置登录状态
    public function auto_login($user)
    {
        // 记录登录SESSION
        $info = array(
            'uid'      => $user['id'],
            'username' => $user['username'],
            'realname' => $user['realname'],
            'phone'   => $user['phone'],
        );
        session('user_info', $info); 
        return $this->is_login();
    }
   
    // 检测用户是否登录    
    public function is_login()
    {
        $user = session('user_info');
        if (empty($user)) {
            return 0;
        } else {
            return $user['uid'];
        }
    }
}