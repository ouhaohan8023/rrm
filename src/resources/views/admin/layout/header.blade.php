<header class="header white-bg">
    <div class="sidebar-toggle-box">
        <i class="fa fa-bars"></i>
    </div>
    <!--logo start-->
    <a href="/" class="logo">{{config('admin.admin_header_part_1')}}<span>{{config('admin.admin_header_part_2')}}</span></a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
            <li>
                <a href="/lang/zh-cn" @if(isset($lang) && $lang == 'zh-cn') style="background-color: #2adeeb;color: #000000" @endif>
                    <svg class="icon" aria-hidden="true" style="font-size: 18px">
                        <use xlink:href="#icon-zhongwen"></use>
                    </svg>
                </a>
            </li>
            <li>
                <a href="/lang/en" @if(isset($lang) && $lang == 'en') style="background-color: #2adeeb;color: #000000" @endif>
                    <svg class="icon" aria-hidden="true" style="font-size: 18px;">
                        <use xlink:href="#icon-yingyu"></use>
                    </svg>
                </a>
            </li>
        </ul>
        <!--  notification end -->
    </div>
    <div class="top-nav ">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
            <li>
                <input type="text" class="form-control search" placeholder="Search">
            </li>
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    @if(\Illuminate\Support\Facades\Auth::user()->avatar)
                        <img alt="" src="{{asset('storage/'.\Illuminate\Support\Facades\Auth::user()->avatar)}}"
                             width="29px" height="29px">
                    @else
                        <img alt="" src="{{ asset('img/avatar1_small.jpg') }}">
                    @endif
                    <span class="username">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                    <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                    <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fa fa-key"></i> Log Out
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a></li>
                </ul>
            </li>
            <li class="sb-toggle-right">
                <i class="fa  fa-align-right"></i>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!--search & user info end-->
    </div>
</header>
