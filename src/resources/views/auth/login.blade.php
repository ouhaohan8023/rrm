<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>{{config('admin.admin_name')}}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="{{ asset('admin_panel/css/bootstrap-reset.css?').config('admin.resource_version') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('admin_panel/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="{{ asset('admin_panel/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_panel/css/style-responsive.css') }}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('admin_panel/js/html5shiv.js') }}"></script>
    <script src="{{ asset('admin_panel/js/respond.min.js') }}"></script>
    <![endif]-->

    <style>
        .form-signin input[type="email"]{
            margin-bottom: 15px;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            border: 1px solid #eaeaea;
            box-shadow: none;
            font-size: 12px;
        }
    </style>
</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" action="{{ route('login') }}" method="POST">
        @csrf
        <h2 class="form-signin-heading">@lang('rrm::base.sign in now')</h2>
        <div class="login-wrap">
            @if (isset($errors) && ($errors->has('email') || $errors->has('password')))
            <div class="alert alert-block alert-danger fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="fa fa-times"></i>
                </button>
                <strong>@lang('rrm::base.Oh snap!')</strong> {{ $errors->first() }}
            </div>
            @endif
            <input type="email" class="form-control" placeholder="{{__('rrm::base.Email')}}" name="email" value="{{ old('email') }}"
                   required autofocus>
            <input type="password" class="form-control" placeholder="{{__('rrm::base.Password')}}" name="password" required
                   autocomplete="current-password">
            <label class="checkbox">
                <input type="checkbox" value="remember-me" name="remember"
                       id="remember" {{ old('remember') ? 'checked' : '' }}> @lang('rrm::base.Remember me')
{{--                <span class="pull-right">--}}
{{--                    <a data-toggle="modal" href="#myModal"> @lang('rrm::base.Forgot Password?')</a>--}}

{{--                </span>--}}
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">@lang('rrm::base.Sign in')</button>
            <div>
                <a href="/login/en">
                    <span>English</span>
                </a>
                <a href="/login/zh-cn">
                    <span>中文</span>
                </a>
            </div>
        </div>
    </form>

{{--    <!-- Modal -->--}}
{{--    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal"--}}
{{--         class="modal fade">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
{{--                    <h4 class="modal-title">@lang('rrm::base.Forgot Password ?')</h4>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <p>Enter your e-mail address below to reset your password.</p>--}}
{{--                    <input type="text" name="email" placeholder="Email" autocomplete="off"--}}
{{--                           class="form-control placeholder-no-fix">--}}

{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>--}}
{{--                    <button class="btn btn-success" type="button">Submit</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- modal -->--}}

</div>


<!-- js placed at the end of the document so the pages load faster -->
<script src="admin/js/jquery.js"></script>
<script src="admin/js/bootstrap.min.js"></script>

@include('rrm::admin.layout.svg')

</body>
</html>
