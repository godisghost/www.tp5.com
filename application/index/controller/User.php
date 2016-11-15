<?php 
namespace app\index\controller;

use app\index\model\User as UserModel;
use app\index\model\Book;
use app\index\model\Role;
use app\index\model\Profile;

class User {

	public function index() {
		$list = UserModel::all();
		$this->assign('list',$list);
		$this->assign('count',count($list));
		return $this->fetch();
  	
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

	public function delete($id) {
		$user = UserModel::get($id);
		if($user->delete()) {
			$user->profile->delete();
			return '用户[ '.$user->name.' ]删除成功!';
		} else {
			return $this->getError();
		}
	}


	public function addBook() {
		$user = UserModel::get(1);
		$book = new Book;
		$book->title = 'ThinkPHP快速入门';
		$book->publish_time = '2016-05-14';
		$user->books()->save($book);
		return '添加Book成功。';

	}


	public function readBook() {
		$user = UserModel::get(1,'books');
		$books = $user->books;
		dump($books);
	}


	public function addRole() {
		$user = UserModel::getByNickname('张三');
		$user->roles()->saveAll([
        ['name' => 'leader', 'title' => '领导'],
        ['name' => 'admin', 'title' => '管理员'],
    ]);
		return '用户角色新增成功';
	}
}