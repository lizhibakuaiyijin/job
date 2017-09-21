<?php
return array(
	//'配置项'=>'配置值'
    'URL_MODEL'          => 2, //URL模式
	###################数据库基本设置##########################
    /* 数据库设置 */
    'DB_TYPE'              =>  'mysql', // 数据库类型
    'DB_HOST'              =>  '47.94.141.34', // 服务器地址
    'DB_NAME'              =>  'stu_job', // 数据库名
    'DB_USER'              => 'root', // 用户名
    'DB_PWD'               => '123456', // 密码
    'DB_PORT'              => '3306', // 端口
    'DB_PREFIX'            => 'job_', // 数据库表前缀
    //定义模块
    'MODULE_ALLOW_LIST' => ['Home', 'Admin'],
     //默认访问模块             
    'DEFAULT_MODULE' => 'Home' 
);