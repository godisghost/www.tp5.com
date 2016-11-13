<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    //第六单的内容
    'user/index'      => 'index/user/index',
    'user/create'     => 'index/user/create',
    'user/add'        => 'index/user/add',
    'user/add_list'   => 'index/user/addList',    
    'user/update/:id' => 'index/user/update',
    'user/delete/:id' => 'index/user/delete',
    'user/:id'        => 'index/user/read',
    //第二单的内容
    // 'hello/[:name]'     => 'index/index/hello',
    'blog/:year/:month' => ['blog/archive', ['method' => 'get'], ['year' => '\d{4}', 'month' => '\d{2}']],
    'blog/:id'          => ['blog/get', ['method' => 'get'], ['id' => '\d+']],
    'blog/:name'        => ['blog/read', ['method' => 'get'], ['name' => '\w+']],

];
