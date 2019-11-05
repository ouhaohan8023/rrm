@if (Session::has('success'))
    @include('rrm::admin.layout.success',['msg'=>Session::get('success')])
@endif
@if (Session::has('error'))
    @include('rrm::admin.layout.error',['msg'=>Session::get('error')])
@endif
