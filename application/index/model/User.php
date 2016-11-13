<?php 
namespace app\index\model;

use think\Model;

class User extends Model{
	
	protected $autoWriteTimestamp = true;

	protected $insert = ['status'=>'1'];

	public function profile() {
		return $this->hasOne('Profile');
	}
}