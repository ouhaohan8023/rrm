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
                'url'  => 'admin.menu.',
                'icon' => 'fa fa-bullseye'
            ],
            [
                'url'  => 'admin.menu.index',
                'icon' => ''
            ],
            [
                'url'  => 'admin.menu.create',
                'icon' => ''
            ],
            [
                'url'  => 'admin.menu.make',
                'icon' => ''
            ],
            [
                'url'  => 'admin.role.',
                'icon' => 'fa fa-users'
            ],
            [
                'url'  => 'admin.role.index',
                'icon' => ''
            ],
            [
                'url'  => 'admin.role.create',
                'icon' => ''
            ],
            [
                'url'  => 'admin.permission.',
                'icon' => 'fa fa-bars'
            ],
            [
                'url'  => 'admin.permission.index',
                'icon' => ''
            ],
            [
                'url'  => 'admin.permission.reload',
                'icon' => ''
            ],
            [
                'url'  => 'admin.index',
                'icon' => 'fa fa-tachometer'
            ],
            [
                'url'  => 'admin.user.',
                'icon' => 'fa fa-user'
            ],
            [
                'url'  => 'admin.user.index',
                'icon' => ''
            ],
            [
                'url'  => 'admin.user.create',
                'icon' => ''
            ],
            [
                'url'  => 'admin.op-log.index',
                'icon' => 'fa fa-eye'
            ],
        ];

        DB::table('admin_menus')->insert($data);
    }
}
