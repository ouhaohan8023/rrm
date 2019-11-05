
                     @can("admin.index")
                    <li>
                    <a @if(Route::currentRouteName() == "admin.index") class="active" @endif href="/admin">
                    <i class="fa fa-tachometer"></i>
                    <span>数据面板</span>
                    </a>
                    </li>
                    @endcan

@can("admin.user.")
<li class="sub-menu dcjq-parent-li">
<a href="javascript:;" class="dcjq-parent @if(doCurrentRoute(Route::currentRouteName()) == 'admin.user.') active @endif">
<i class="fa fa-user"></i>
<span>用户管理</span>
</a><ul class="sub @if(doCurrentRoute(Route::currentRouteName()) == 'admin.user.') style="display: block;" @endif">
                    @can("admin.user.index")
                    <li @if(Route::currentRouteName() == "admin.user.index") class="active" @endif>
                    <a href="/admin/user/index">用户列表</a>
                    </li>
                    @endcan

                    @can("admin.user.create")
                    <li @if(Route::currentRouteName() == "admin.user.create") class="active" @endif>
                    <a href="/admin/user/create">新建用户</a>
                    </li>
                    @endcan
                    </ul></li>
@endcan

@can("admin.menu.")
<li class="sub-menu dcjq-parent-li">
<a href="javascript:;" class="dcjq-parent @if(doCurrentRoute(Route::currentRouteName()) == 'admin.menu.') active @endif">
<i class="fa fa-bullseye"></i>
<span>菜单管理</span>
</a><ul class="sub @if(doCurrentRoute(Route::currentRouteName()) == 'admin.menu.') style="display: block;" @endif">
                    @can("admin.menu.index")
                    <li @if(Route::currentRouteName() == "admin.menu.index") class="active" @endif>
                    <a href="/admin/menu/index">菜单列表</a>
                    </li>
                    @endcan

                    @can("admin.menu.create")
                    <li @if(Route::currentRouteName() == "admin.menu.create") class="active" @endif>
                    <a href="/admin/menu/create">新建菜单</a>
                    </li>
                    @endcan

                    @can("admin.menu.make")
                    <li @if(Route::currentRouteName() == "admin.menu.make") class="active" @endif>
                    <a href="/admin/menu/make">构建菜单</a>
                    </li>
                    @endcan
                    </ul></li>
@endcan

@can("admin.role.")
<li class="sub-menu dcjq-parent-li">
<a href="javascript:;" class="dcjq-parent @if(doCurrentRoute(Route::currentRouteName()) == 'admin.role.') active @endif">
<i class="fa fa-users"></i>
<span>角色管理</span>
</a><ul class="sub @if(doCurrentRoute(Route::currentRouteName()) == 'admin.role.') style="display: block;" @endif">
                    @can("admin.role.index")
                    <li @if(Route::currentRouteName() == "admin.role.index") class="active" @endif>
                    <a href="/admin/role/index">角色列表</a>
                    </li>
                    @endcan

                    @can("admin.role.create")
                    <li @if(Route::currentRouteName() == "admin.role.create") class="active" @endif>
                    <a href="/admin/role/create">新建角色</a>
                    </li>
                    @endcan
                    </ul></li>
@endcan

@can("admin.permission.")
<li class="sub-menu dcjq-parent-li">
<a href="javascript:;" class="dcjq-parent @if(doCurrentRoute(Route::currentRouteName()) == 'admin.permission.') active @endif">
<i class="fa fa-bars"></i>
<span>路由管理</span>
</a><ul class="sub @if(doCurrentRoute(Route::currentRouteName()) == 'admin.permission.') style="display: block;" @endif">
                    @can("admin.permission.index")
                    <li @if(Route::currentRouteName() == "admin.permission.index") class="active" @endif>
                    <a href="/admin/permission/index">路由列表</a>
                    </li>
                    @endcan

                    @can("admin.permission.reload")
                    <li @if(Route::currentRouteName() == "admin.permission.reload") class="active" @endif>
                    <a href="/admin/permission/reload">路由检测</a>
                    </li>
                    @endcan
                    </ul></li>
@endcan
