<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
        return 'index';
    }

    public function hello($name = 'World',$city = 'beijing') {
    	return 'Hello,'.$name.'! you come from '.$city.'.';
    }
}
