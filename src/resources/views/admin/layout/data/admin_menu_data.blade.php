@can("admin.index")
    <li>
        <a @if(Route::currentRouteName() == "admin.index") class="active" @endif href="/admin">
            <i class="fa fa-tachometer"></i>
            <span>@lang("rrm::permission.admin.index")</span>
        </a>
    </li>
@endcan

@can("admin.user.")
    <li class="sub-menu dcjq-parent-li">
        <a href="javascript:;"
           class="dcjq-parent @if(doCurrentRoute(Route::currentRouteName()) == 'admin.user.') active @endif">
            <i class="fa fa-user"></i>
            <span>@lang("rrm::permission.admin.user.")</span>
        </a>
        <ul class="sub @if(doCurrentRoute(Route::currentRouteName()) == 'admin.user.') style=" display: block;
        " @endif">
    @can("admin.user.index")
        <li @if(Route::currentRouteName() == "admin.user.index") class="active" @endif>
            <a href="/admin/user/index">@lang("rrm::permission.admin.user.index")</a>
        </li>
    @endcan

    @can("admin.user.create")
        <li @if(Route::currentRouteName() == "admin.user.create") class="active" @endif>
            <a href="/admin/user/create">@lang("rrm::permission.admin.user.create")</a>
        </li>
        @endcan
        </ul></li>
    @endcan

    @can("admin.menu.")
        <li class="sub-menu dcjq-parent-li">
            <a href="javascript:;"
               class="dcjq-parent @if(doCurrentRoute(Route::currentRouteName()) == 'admin.menu.') active @endif">
                <i class="fa fa-bullseye"></i>
                <span>@lang("rrm::permission.admin.menu.")</span>
            </a>
            <ul class="sub @if(doCurrentRoute(Route::currentRouteName()) == 'admin.menu.') style=" display: block;
            " @endif">
        @can("admin.menu.index")
            <li @if(Route::currentRouteName() == "admin.menu.index") class="active" @endif>
                <a href="/admin/menu/index">@lang("rrm::permission.admin.menu.index")</a>
            </li>
        @endcan

        @can("admin.menu.create")
            <li @if(Route::currentRouteName() == "admin.menu.create") class="active" @endif>
                <a href="/admin/menu/create">@lang("rrm::permission.admin.menu.create")</a>
            </li>
        @endcan

        @can("admin.menu.make")
            <li @if(Route::currentRouteName() == "admin.menu.make") class="active" @endif>
                <a href="/admin/menu/make">@lang("rrm::permission.admin.menu.make")</a>
            </li>
            @endcan
            </ul></li>
        @endcan

        @can("admin.role.")
            <li class="sub-menu dcjq-parent-li">
                <a href="javascript:;"
                   class="dcjq-parent @if(doCurrentRoute(Route::currentRouteName()) == 'admin.role.') active @endif">
                    <i class="fa fa-users"></i>
                    <span>@lang("rrm::permission.admin.role.")</span>
                </a>
                <ul class="sub @if(doCurrentRoute(Route::currentRouteName()) == 'admin.role.') style=" display: block;
                " @endif">
            @can("admin.role.index")
                <li @if(Route::currentRouteName() == "admin.role.index") class="active" @endif>
                    <a href="/admin/role/index">@lang("rrm::permission.admin.role.index")</a>
                </li>
            @endcan

            @can("admin.role.create")
                <li @if(Route::currentRouteName() == "admin.role.create") class="active" @endif>
                    <a href="/admin/role/create">@lang("rrm::permission.admin.role.create")</a>
                </li>
                @endcan
                </ul></li>
            @endcan

            @can("admin.permission.")
                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;"
                       class="dcjq-parent @if(doCurrentRoute(Route::currentRouteName()) == 'admin.permission.') active @endif">
                        <i class="fa fa-bars"></i>
                        <span>@lang("rrm::permission.admin.permission.")</span>
                    </a>
                    <ul class="sub @if(doCurrentRoute(Route::currentRouteName()) == 'admin.permission.') style="
                        display: block;
                    " @endif">
                @can("admin.permission.index")
                    <li @if(Route::currentRouteName() == "admin.permission.index") class="active" @endif>
                        <a href="/admin/permission/index">@lang("rrm::permission.admin.permission.index")</a>
                    </li>
                @endcan

                @can("admin.permission.reload")
                    <li @if(Route::currentRouteName() == "admin.permission.reload") class="active" @endif>
                        <a href="/admin/permission/reload">@lang("rrm::permission.admin.permission.reload")</a>
                    </li>
                    @endcan
                    </ul></li>
                @endcan
