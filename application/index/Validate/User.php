<?php 

namespace app\index\validate;

use think\Validate;

class User extends Validate{

	//验证规则
	protected $rule = [
			// 'nickname|昵称' => 'require|min:5|token',
			// 'email|邮箱'	   => 'require|email',
			// 'birthday|生日' => 'dateFormat:Y-m-d',
			// 
			//采用数据方式验证
			'nickname' => ['require','min'=>5,'token'],
			'email' => ['require','email'],
			'birthday' => ['dateformat' => 'Y|m|d'],
	];
}