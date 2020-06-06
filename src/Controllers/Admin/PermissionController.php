<?php

namespace OhhInk\Rrm\Controllers\Admin;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;

class PermissionController extends BaseController
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
     * 路由列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = Permission::query()->select('id', 'name', 'created_at',
            'updated_at')->orderBy('id','desc')->paginate(config('admin.per_page'));
        return view('rrm::admin.permission.index', ['data' => $data]);
    }

    /**
     * 删除路由
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function delete()
    {
        $input = request()->input();
        $permissions = Permission::findById($input['id']);
        // 删除权限-用户关联
        $users = $permissions->users()->get();
        if ($users) {
            foreach ($users as $user) {
                $user->revokePermissionTo($permissions);
            }
        }
        // 删除角色-权限关联
        $roles = $permissions->roles()->get();
        if ($roles) {
            foreach ($roles as $role) {
                $role->revokePermissionTo($permissions);
            }
        }
        // 删除角色
        if ($permissions) {
            $permissions->delete();
            $success = __('rrm::permission.model').__('rrm::base.delete').__('rrm::base.success');
            app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
            return Redirect::back()->with('success', $success);
        } else {
            $error = __('rrm::permission.model').__('rrm::base.delete').__('rrm::base.error');
            return Redirect::back()->with('error', $error);
        }
    }

    public function reload()
    {
        Artisan::call('db:seed --class=PermissionSeeder');
        $success = __('rrm::permission.model').__('rrm::base.success');
        return redirect()->route('admin.permission.index')->with('success', $success);
    }


}

