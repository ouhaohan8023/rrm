<?php

namespace OhhInk\Rrm\Controllers\Admin;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;

class RoleController extends BaseController
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
     * 角色列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = Role::query()->select('id', 'name', 'created_at', 'updated_at')->paginate(config('admin.per_page'));
        return view('rrm::admin.role.index', ['data' => $data]);
    }

    /**
     * 删除角色
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function delete()
    {
        $input = request()->input();
        $role = Role::findById($input['id']);
        // 删除角色-用户关联
        $users = $role->users()->get();
        if ($users) {
            foreach ($users as $user) {
                $user->removeRole($role);
            }
        }
        // 删除角色-权限关联
        $permissions = $role->permissions()->get();
        if ($permissions) {
            foreach ($permissions as $permission) {
                $role->revokePermissionTo($permission);
            }
        }
        // 删除角色
        if ($role) {
            $role->delete();
            $success = __('rrm::role.model').__('rrm::base.delete').__('rrm::base.success');
            flushPermission();
            return Redirect::back()->with('success', $success);
        } else {
            $error = __('rrm::role.model').__('rrm::base.delete').__('rrm::base.error');
            return Redirect::back()->with('error', $error);
        }
    }

    /**
     * 角色新增
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        if (request()->method() == 'POST') {
            $data = request()->input();
            $create['name'] = $data['key'];
            $create = Role::create($create);
            if ($create) {
                flushPermission();
                $success = __('rrm::role.model').__('rrm::base.create').__('rrm::base.success');
                return redirect()->route('admin.role.index')->with('success', $success);
            } else {
                $error = __('rrm::role.model').__('rrm::base.error');
                return redirect()->route('admin.role.index')->with('error', $error);
            }

        } else {
            return view('rrm::admin.role.form');
        }
    }

    public function update($id)
    {
        $role = Role::findById($id);
        if (!$role) {
            $error = __('rrm::role.model').__('rrm::base.error');
            return Redirect::back()->with('error',$error);
        }
        if (request()->method() == 'POST') {
            $name = request()->input("key");
            $users = $role->users()->get();
            $role->name = $name;
            $update = $role->save();

            if ($users) {
                foreach ($users as $user) {
                    $user->syncRoles([$name]);
                }
            }

            if ($update) {
                flushPermission();
                $success = __('rrm::role.model').__('rrm::base.update').__('rrm::base.success');
                return redirect()->route('admin.role.index')->with('success', $success);
            } else {
                $error = __('rrm::role.model').__('rrm::base.error');
                return redirect()->route('admin.role.index')->with('error', $error);
            }
        } else {
            return view('rrm::admin.role.form',['data' => $role]);
        }
    }

    /**
     * 给角色分配权限
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function assignment($id)
    {
        $role = Role::findById($id);
        if (!$role) {
            $error = __('rrm::role.model').__('rrm::base.not exist');
            return redirect()->route('admin.role.index')->with('error', $error);
        }

        if (request()->method() == 'POST') {
            $data = request()->all();
            $role->syncPermissions(Arr::get($data, 'permissions'));
            flushPermission();
            $success = __('rrm::role.assignment permission for', ['role' => $role->name]).__('rrm::base.success');
            return redirect()->route('admin.role.index')->with('success', $success);
        } else {
            $permission = Permission::all()->pluck('name')->toArray();
            $has = $role->permissions()->get()->pluck('name')->toArray();
            $select = array_intersect($permission, $has);
            $no_select = array_diff($permission, $has);
            return view('rrm::admin.role.assignment', [
                'role'      => $role,
                'select'    => $select,
                'no_select' => $no_select,
                'id'        => $id
            ]);
        }
    }

}

