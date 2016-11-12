<?php
namespace app\index\controller;

class Blog {

	public function get($id) {
		return '查看id='.$id.'内容';
	}

	public function read($name) {
		return '查看name='.$name.'内容';
	}

	public function archive($year,$month) {
		return '查看'.$year.'年'.$month.'月的档案';
	}
}