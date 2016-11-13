<?php 
namespace app\index\controller;

use app\index\model\User as UserModel;
use app\index\model\Profile;

class User {

	public function index() {
		$list = UserModel::where('id','<',15)->select();
  	foreach ($list as $user) {
  		echo $user->id.'<br/>';
  		echo $user->nickname.'<br/>';
  		echo $user->email.'<br/>';
  		echo $user->birthday.'<br/>';
  		echo $user->status.'<br/>';
  		echo '-----------------------------------<br/>';
  	}
	}

	public function update($id) {
		$user = UserModel::get($id);
		$user->name = 'framework';
		if ($user->save()) {
			$user->profile->email = 'liu21st@hotmmail.com';
			$user->profile->save();
			return '用户['.$user->name.']更新成功';
		} else {
			return $user->getError();
		}
	}

	public function add() {
		$user = new UserModel;
		$user->name = 'thinkphp';
		$user->password = '123456';
		$user->nickname = '流年';
		if ($user->save()) {
			$profile = new Profile;
			$profile->truename = '刘晨';
			$profile->birthday = '1977-05-12';
			$profile->address = '中国上海';
			$profile->email = 'thinkphp@qq.com';
			$user->profile()->save($profile);
			return '用户新增成功！';
		} else {
			return $user->getError();
		}
	}

	public function addList()
	{
    $user = new UserModel;
    $list = [
        ['nickname' => '张三', 'email' => 'zhanghsan@qq.com', 'birthday' => strtotime('1988-01-15')],
        ['nickname' => '李四', 'email' => 'lisi@qq.com', 'birthday' => strtotime('1990-09-19')],
    ];
    if ($user->saveAll($list)) {
        return '用户批量新增成功';
    } else {
        return $user->getError();
    }
	}

	// 读取用户数据
	public function read($id)
	{
    $user = UserModel::get($id,'profile');
    echo $user->name . '<br/>';
    echo $user->nickname . '<br/>';
    echo $user->profile->truename . '<br/>';
    echo $user->profile->email . '<br/>';
	}



	public function create() {
		return view();
	}
}