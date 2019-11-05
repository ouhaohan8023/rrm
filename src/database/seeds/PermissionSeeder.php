<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $routers = array_keys(Route::getRoutes()->getRoutesByName());
        $role = Role::query()->where('name','admin')->first();
        foreach ($routers as $route) {
            $exist = Permission::query()->where('name',$route)->exists();
            if (!$exist) {
                $permission = Permission::create(['name' => $route]);
                $permission->assignRole($role);
            }
        }
    }
}
