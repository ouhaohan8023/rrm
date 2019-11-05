<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => '菜单管理',
                'url'  => 'admin.menu.',
                'icon' => 'fa fa-bullseye'
            ],
            [
                'name' => '菜单列表',
                'url'  => 'admin.menu.index',
                'icon' => ''
            ],
            [
                'name' => '新建菜单',
                'url'  => 'admin.menu.create',
                'icon' => ''
            ],
            [
                'name' => '构建菜单',
                'url'  => 'admin.menu.make',
                'icon' => ''
            ],
            [
                'name' => '角色管理',
                'url'  => 'admin.role.',
                'icon' => 'fa fa-users'
            ],
            [
                'name' => '角色列表',
                'url'  => 'admin.role.index',
                'icon' => ''
            ],
            [
                'name' => '新建角色',
                'url'  => 'admin.role.create',
                'icon' => ''
            ],
            [
                'name' => '路由管理',
                'url'  => 'admin.permission.',
                'icon' => 'fa fa-bars'
            ],
            [
                'name' => '路由列表',
                'url'  => 'admin.permission.index',
                'icon' => ''
            ],
            [
                'name' => '路由检测',
                'url'  => 'admin.permission.reload',
                'icon' => ''
            ],
            [
                'name' => '数据面板',
                'url'  => 'admin.index',
                'icon' => 'fa fa-tachometer'
            ],
            [
                'name' => '用户管理',
                'url'  => 'admin.user.',
                'icon' => 'fa fa-user'
            ],
            [
                'name' => '用户列表',
                'url'  => 'admin.user.index',
                'icon' => ''
            ],
            [
                'name' => '新建用户',
                'url'  => 'admin.user.create',
                'icon' => ''
            ],
        ];

        DB::table('admin_menus')->insert($data);
    }
}
