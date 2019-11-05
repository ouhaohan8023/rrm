<?php

return [
    'role'       => [
        'assignment permission for' => '给 :role 分配路由',

        'role'        => '角色',
        'name'        => '角色名称',
        'admin'       => '管理员',
        'super_admin' => '超级管理员',
        'test'        => '测试角色',
    ],
    'permission' => [
        'permission' => '路由',
        'name'       => '名称',


        ### 以下为所有路由翻译
        'home'       => '首页',
        'login'      => '登陆',
        'logout'     => '登出',
        'register'   => '注册',
        'admin'      => [
            'index' => '后台首页',
            'test'  => '测试路由',
            'user'  => [
                'index'      => '用户管理',
                'create'     => '新建用户',
                'delete'     => '删除用户',
                'assignment' => '分配角色'
            ],
            'sys'   => [
                'role'       => [
                    'index'      => '角色管理',
                    'delete'     => '删除角色',
                    'create'     => '新建角色',
                    'permission' => '分配路由'
                ],
                'permission' => [
                    'index'  => '路由管理',
                    'delete' => '删除路由',
                    'create' => '新建路由',
                    'reload' => '路由检测'
                ],
                'menu'       => [
                    'index'  => '菜单管理',
                    'delete' => '删除菜单',
                    'create' => '新建菜单',
                    'make'   => '构建菜单'
                ]
            ]
        ],
        //        'password' => [
        //            'reset' => '重置密码'
        //        ]
    ],
    'menu'       => [
        'menu'         => '菜单',
        'permission'   => '路由',
        'expand all'   => '展开所有',
        'collapse all' => '关闭所有',
    ]
];
