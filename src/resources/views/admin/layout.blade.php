<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="Laravel RBAC, Laravel Dashboard">
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">

    <title>{{config('app.APP_NAME')}}</title>

    <!-- Bootstrap core CSS -->
    {{--    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">--}}
    {{--    太慢了，改用cdn--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href="{{ asset('css/bootstrap-reset.css?').config('admin.resource_version') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet"/>

    <!--right slidebar-->
    <link href="{{ asset('css/slidebars.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="{{ asset('css/style.min.css?').config('admin.resource_version') }}" rel="stylesheet">
    <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet"/>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('js/html5shiv.js') }}"></script>
    <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
    @yield('css')
    @stack('css')
</head>

<body>
<section id="container">
    @include('rrm::admin.layout.header')
    {{--@include('rrm::admin.layout.aside')--}}
    @include('rrm::admin.layout.menu')
    @yield('content')
    @include('rrm::admin.layout.right-bar')
    @include('rrm::admin.layout.footer')
</section>
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ asset('js/jquery.js') }}"></script>
{{--<script src="{{ asset('js/bootstrap.min.js') }}"></script>--}}
{{--太慢了，改用cdn--}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script class="include" type="text/javascript" src="{{ asset('js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('js/jquery.nicescroll.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.customSelect.min.js') }}"></script>

<!--right slidebar-->
<script src="{{ asset('js/slidebars.min.js') }}"></script>

<!--common script for all pages-->
<script src="{{ asset('js/common-scripts.js') }}"></script>

<!--script for this page-->

@yield('js')
@stack('scripts')

<script>
  //custom select box

  $(function () {
    $('select.styled').customSelect();
  });

  $(window).on("resize", function () {
    var owl = $("#owl-demo").data("owlCarousel");
    owl.reinit();
  });

</script>

</body>
</html>
