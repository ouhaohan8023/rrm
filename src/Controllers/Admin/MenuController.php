<?php

namespace OhhInk\Rrm\Controllers\Admin;

use OhhInk\Rrm\Model\AdminMenu;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;

class MenuController extends BaseController
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
     * 菜单管理
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = AdminMenu::query()->paginate(config('admin.per_page'));
        return view('rrm::admin.menu.index', ['data' => $data]);
    }

    /**
     * 新增菜单
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create()
    {
        if (request()->method() == 'POST') {
            $data = request()->input();
            $create = AdminMenu::create($data);
            if ($create) {
                $success = __('rrm::menu.model').__('rrm::base.create').__('rrm::base.success');
                return redirect()->route('admin.menu.index')->with('success', $success);
            } else {
                $error = __('rrm::menu.model').__('rrm::base.error');
                return redirect()->route('admin.menu.index')->with('error', $error);
            }
        } else {
            $allPermission = Permission::query()->select('name')->get();
            return view('rrm::admin.menu.form', ['permission' => $allPermission]);
        }
    }

    /**
     * 菜单删除
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete()
    {
        $id = request()->input('id');
        $cache = json_decode(Cache::get('admin_menu'), true);
        $newCache = $this->deleteMenuCacheById($cache, $id);
        Cache::forever('admin_menu', json_encode($newCache));
        $contents = $this->buildMenuForView($newCache);
        $file = Storage::disk('menu')->put('./admin/layout/data/admin_menu_data.blade.php', $contents);
        AdminMenu::destroy($id);
        $success = __('rrm::menu.model').__('rrm::base.delete').__('rrm::base.success');
        return Redirect::back()->with('success', $success);
    }

    public function update($id)
    {
        $menu = AdminMenu::find($id);
        if (!$menu) {
            $error = __('rrm::menu.model').__('rrm::base.error');
            Redirect::back()->with('error', $error);
        }
        if (request()->method() == 'POST') {
            $data = request()->input();
            $menu->icon = $data['icon'];
            $menu->url = $data['url'];
            $update = $menu->save();
            $cache = json_decode(Cache::get('admin_menu'), true);
            $newCache = $this->updateMenuCacheById($cache, $id, $data);
            Cache::forever('admin_menu', json_encode($newCache));
            $contents = $this->buildMenuForView($newCache);
            $file = Storage::disk('menu')->put('./admin/layout/data/admin_menu_data.blade.php', $contents);
            if ($update) {
                $success = __('rrm::menu.model').__('rrm::base.create').__('rrm::base.success');
                return redirect()->route('admin.menu.index')->with('success', $success);
            } else {
                $error = __('rrm::menu.model').__('rrm::base.error');
                return redirect()->route('admin.menu.index')->with('error', $error);
            }
        } else {
            $allPermission = Permission::query()->select('name')->get();
            return view('rrm::admin.menu.form', ['permission' => $allPermission, 'data' => $menu]);
        }
    }

    /**
     * 构建菜单层级和顺序
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function make()
    {
        if (request()->method() == 'POST') {
            $data = request()->input('data');
            $set = Cache::forever('admin_menu', $data);
            if ($set) {
                $success = __('rrm::menu.model').__('rrm::base.update').__('rrm::base.success');

                // 将菜单转为静态文件
                $data = json_decode($data, true);
                $contents = $this->buildMenuForView($data);
                $file = Storage::disk('menu')->put('./vendor/rrm/admin/layout/data/admin_menu_data.blade.php', $contents);

                return Redirect::back()->with('success', $success);
            } else {
                $error = __('rrm::menu.model').__('rrm::base.error');
                return Redirect::back()->with('error', $error);
            }
        } else {
            $redis = Cache::get('admin_menu');
            if ($redis) {
                $admin_menu = json_decode($redis, true);
                $ids = $this->getUsesMenuForMake($admin_menu);
                $new = AdminMenu::query()->whereNotIn('id', $ids)->get()->toArray();
                $admin_menu = array_merge($admin_menu, $new);
            } else {
                $admin_menu = AdminMenu::all();
            }
            $data = $this->buildMenuForMake($admin_menu);

            return view('rrm::admin.menu.make', ['data' => $data]);
        }
    }

    public function clear()
    {
        Cache::forget('admin_menu');
        $success = __('rrm::menu.model').__('rrm::base.clear').__('rrm::base.success');
        return Redirect::back()->with('success', $success);
    }

    /**
     * 为构造菜单生成html数据
     * @param $data
     * @return string
     */
    function buildMenuForMake($data)
    {
        $menu = '';
        foreach ($data as $k => $v) {
            if (isset($v['children'])) {
                $menu .= '<li class="dd-item" data-id="'.$v['id'].'" data-url="'.$v['url'].'" data-icon="'.$v['icon'].'"><div class="dd-handle">'.__('rrm::permission.'.$v['url']).'</div>';
                $menu .= '<ol class="dd-list">';
                $menu .= $this->buildMenuForMake($v['children']);
                $menu .= '</ol></li>';
            } else {
                $menu .= '<li class="dd-item" data-id="'.$v['id'].'" data-url="'.$v['url'].'" data-icon="'.$v['icon'].'"><div class="dd-handle">'.__('rrm::permission.'.$v['url']).'</div></li>';
            }
        }
        return $menu;
    }

    /**
     * 读取构建好的菜单id，用于删选新增的菜单
     * @param $data
     * @return array
     */
    function getUsesMenuForMake($data)
    {
        $ids = [];
        foreach ($data as $d) {
            $ids[] = $d['id'];
            if (isset($d['children'])) {
                $childIds = $this->getUsesMenuForMake($d['children']);
                $ids = array_merge($ids, $childIds);
            }
        }
        return $ids;
    }

    /**
     * 将菜单设置为静态文件
     * @param $data
     * @param  bool  $child
     * @return string
     */
    function buildMenuForView($data, $child = false)
    {
        $menu = '';
        foreach ($data as $k => $v) {
            if (isset($v['children'])) {
                $menu .= '
@can("'.$v["url"].'")
<li class="sub-menu dcjq-parent-li">
<a href="javascript:;" class="dcjq-parent @if(doCurrentRoute(Route::currentRouteName()) == \''.$v["url"].'\') active @endif">
<i class="'.$v['icon'].'"></i>
<span>@lang("rrm::permission.'.$v['url'].'")</span>
</a>';
                $menu .= '<ul class="sub @if(doCurrentRoute(Route::currentRouteName()) == \''.$v["url"].'\') style="display: block;" @endif">';
                $menu .= $this->buildMenuForView($v['children'], true);
                $menu .= '</ul></li>
@endcan
';
            } else {
                if ($child) {
                    $menu .= '
                    @can("'.$v["url"].'")
                    <li @if(Route::currentRouteName() == "'.$v["url"].'") class="active" @endif>
                    <a href="'.route($v['url'],[],false).'">@lang("rrm::permission.'.$v['url'].'")</a>
                    </li>
                    @endcan
                    ';
                } else {
                    $menu .= '
                     @can("'.$v["url"].'")
                    <li>
                    <a @if(Route::currentRouteName() == "'.$v["url"].'") class="active" @endif href="'.route($v['url'],[],false).'">
                    <i class="'.$v['icon'].'"></i>
                    <span>@lang("rrm::permission.'.$v['url'].'")</span>
                    </a>
                    </li>
                    @endcan
                    ';
                }
            }
        }
        return $menu;
    }

    function deleteMenuCacheById($cache, $id)
    {
        foreach ($cache as $k => $v) {
            if ($v['id'] == $id) {
                array_splice($cache, $k, 1);
            } else {
                if (isset($v['children'])) {
                    $cache[$k]['children'] = $this->deleteMenuCacheById($v['children'], $id);
                }
            }
        }
        return $cache;
    }

    function updateMenuCacheById($cache, $id, $update)
    {
        foreach ($cache as $k => $v) {
            if ($v['id'] == $id) {
                $cache[$k]['icon'] = $update['icon'];
                $cache[$k]['url'] = $update['url'];
            } else {
                if (isset($v['children'])) {
                    $cache[$k]['children'] = $this->updateMenuCacheById($v['children'], $id, $update);
                }
            }
        }
        return $cache;
    }
}

