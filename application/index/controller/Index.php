<?php
namespace app\index\controller;

use think\Request;

class Index
{
    public function index()
    {
    	$list = UserModel::all();
    	foreach ($list as $user) {
    		echo $user->nickname.'<br/>';
    		echo $user->email.'<br/>';
    		echo date('Y/m/d',$user->birthday).'<br/>';
    		echo '-----------------------------------<br/>';
    	}
    }
    //系统提供了一个input助手函数来简化Request对象的param方法，用法如下：
    public function hello(){
    	$date = ['name' => 'thinkphp','status' => '1'];
    	return json($date,201,['Cache-control' => 'no-cache,must-revalidate']);
    	
    }

    public function guest() {
    	return 'Hello,guest';
    }
}