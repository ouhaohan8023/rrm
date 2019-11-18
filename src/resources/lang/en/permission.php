<?php

return [
    'model'    => 'Model',
    'name'     => 'Name',
    'url'      => 'Url',

    ### 以下为所有路由翻译
    'home'     => 'Front Index',
    'login'    => 'Login',
    'logout'   => 'Logout',
    'register' => 'Register',
    'error'    => 'No Right To Pass 500',
    'admin'    => [
        'index'      => 'Admin Index',
        'test'       => 'Admin Test',
        'user'       => [
            ''           => 'User Controller',
            'index'      => 'User List',
            'create'     => 'User Create',
            'delete'     => 'User Delete',
            'assignment' => 'User Assignment',
            'update'     => 'User Update'
        ],
        'role'       => [
            ''           => 'Role Controller',
            'index'      => 'Role List',
            'delete'     => 'Role Delete',
            'create'     => 'Role Create',
            'assignment' => 'Role Assignment',
            'update'     => 'Role Update'
        ],
        'permission' => [
            ''       => 'Route Controller',
            'index'  => 'Route List',
            'delete' => 'Route Delete',
            'create' => 'Route Create',
            'reload' => 'Route Reload'
        ],
        'menu'       => [
            ''       => 'Menu Controller',
            'index'  => 'Menu List',
            'delete' => 'Menu Delete',
            'create' => 'Menu Create',
            'make'   => 'Menu Make',
            'clear'  => 'Menu Clear',
            'update' => 'Menu Update'
        ],
        'op-log'     => [
            ''      => 'Operation Log',
            'index' => 'Log List',
            'view'  => 'Log View',
            'clear' => 'Log Clear'
        ]
    ],
    //        'password' => [
    //            'reset' => '重置密码'
    //        ]

];
