<?php

namespace OhhInk\Rrm\Controllers\Admin;

use OhhInk\Rrm\Traits\ValidationForZhCn;
use Spatie\Permission\Models\Role;
use OhhInk\Rrm\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends BaseController
{
    use ValidationForZhCn;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = User::query()->orderBy('id', 'DESC')->paginate(config('admin.per_page'));
        return view('rrm::admin.user.index', ['data' => $data]);
    }

    /**
     * 分配角色
     * @param $id int 用户id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function assignment($id)
    {
        $user = User::find($id);
        if (request()->method() == 'POST') {
            $data = request()->all();
            if (!$user) {
                $error = __('rrm::user.user').__('rrm::base.not exist');
                return redirect()->route('admin.user.index')->with('error', $error);
            } else {
                $user->syncRoles(Arr::get($data, 'roles'));
                flushPermission();
                $success = __('rrm::user.assignment role for', ['user' => $user->name]).__('rrm::base.success');
                return Redirect::back()->with('success', $success);
            }
        } else {
            if (!$user) {
                $error = __('rrm::user.user').__('rrm::base.not exist');
                return Redirect::back()->with('error', $error);
            } else {
                $roles = Role::all()->pluck('name')->toArray();
                $has = $user->getRoleNames()->toArray();

                $select = array_intersect($roles, $has);
                $no_select = array_diff($roles, $has);
                return view('rrm::admin.user.assignment',
                    ['user' => $user, 'select' => $select, 'no_select' => $no_select, 'id' => $id]);
            }
        }
    }

    public function create(Request $request)
    {
        if (request()->method() == 'POST') {
            $this->validate($request, [
                'name'     => ['required', 'string', 'max:255'],
                'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'avatar'   => ['image']
            ], $this->message(),$this->attribute());
            $data = request()->all();
            if ($request->file('avatar')) {
                $fileName = date('YmdHis').$data['name'].rand(10000, 99999).'.'.$request->file('avatar')->extension();
                $filePath = './avatar/'.$fileName;
                Storage::putFileAs('./public/avatar', $request->file('avatar'), $fileName);
            } else {
                $filePath = './admin_panel/avatar/avatar.png';
            }

            $user = User::create([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => Hash::make($data['password']),
                'avatar'   => $filePath,
                'is_test'  => Arr::get($data,'is_test',0)
            ]);
            if ($user) {
                $success = __('rrm::user.model').__('rrm::base.create').__('rrm::base.success');
                return redirect()->route('admin.user.index')->with('success', $success);
            } else {
                $error = __('rrm::user.model').__('rrm::base.error');
                return redirect()->route('admin.user.index')->with('error', $error);
            }
        } else {
            return view('rrm::admin.user.form');
        }
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        if (!$user) {
            $error = __('rrm::user.model').__('rrm::base.error');
            return Redirect::back()->with('error', $error);
        }
        if (request()->method() == 'POST') {
            $data = request()->all();
            Validator::make($data, [
                'name'     => ['required', 'string', 'max:255'],
                'email'    => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore($user)
                ],
                'password' => ['string', 'min:8', 'confirmed'],
                'avatar'   => ['image']
            ], $this->message(),$this->attribute());

            $user->name = $data['name'];
            $user->email = $data['email'];
            if (Arr::get($data, 'password', false)) {
                $user->password = Hash::make($data['password']);
            }
            if (Arr::get($data, 'avatar', false)) {
                $fileName = date('YmdHis').$data['name'].rand(10000, 99999).'.'.$request->file('avatar')->extension();
                $filePath = './avatar/'.$fileName;
                Storage::putFileAs('./public/avatar', $request->file('avatar'), $fileName);
                $user->avatar = $filePath;
            }
            $update = $user->save();
            if ($update) {
                $success = __('rrm::user.model').__('rrm::base.update').__('rrm::base.success');
                return redirect()->route('admin.user.index')->with('success', $success);
            } else {
                $error = __('rrm::user.model').__('rrm::base.error');
                return redirect()->route('admin.user.index')->with('error', $error);
            }
        } else {
            return view('rrm::admin.user.form', ['data' => $user]);
        }
    }

    public function delete()
    {
        $input = request()->input();
        $user = User::find($input['id']);
        // 删除用户
        if ($user) {
            // 删除角色-用户关联
            $user->syncRoles([]);
            $user->delete();
            $success = __('rrm::user.model').__('rrm::base.delete').__('rrm::base.success');
            flushPermission();
            return Redirect::back()->with('success', $success);
        } else {
            $error = __('rrm::user.model').__('rrm::base.delete').__('rrm::base.error');
            return Redirect::back()->with('error', $error);
        }
    }
}

