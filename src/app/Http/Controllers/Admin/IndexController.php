<?php

namespace OhhInk\Rrm\Admin;


use OhhInk\Rrm\Model\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class IndexController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //        Role::create(['name'=>'super_admin']);
        //        $permission = Permission::create(['name' => 'admin.index']);
        //        $role = Role::query()->where('name','admin')->first();
        //        $permission = Permission::query()->where('name','home')->first();
        //        $role->givePermissionTo($permission);
        $user = Auth::user();
        //        $user->assignRole('super_admin');
        //        $user->removeRole('super admin');
                $user = \OhhInk\Rrm\Model\User::role('super_admin')->get();
//                        dd($user);
        return view('rrm::admin.index');
    }
}

