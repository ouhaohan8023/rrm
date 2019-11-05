<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => config('admin.super_admin')]);
        Role::create(['name' => 'admin']);


        $user = \OhhInk\Rrm\Model\User::query()->where('name','admin')->first();
        $user->assignRole(config('admin.super_admin'));
    }
}
