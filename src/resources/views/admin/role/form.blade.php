@extends('rrm::admin.layout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        @include('rrm::admin.layout.create_header',['model'=>'rrm::role.model'])
                        <div class="panel-body">
                            <form class="form-inline" role="form" method="post"
                                  action="{{request('id',false)?route('admin.role.update',['id' => request('id')]):route('admin.role.create')}}">
                                @csrf
                                <div class="form-group">
                                    <label class="sr-only" for="text">@lang('rrm::role.model')</label>
                                    <input type="text" class="form-control" id="text" name="key"
                                           @isset($data['name']) value="{{$data['name']}}" @endisset>
                                </div>
                                <button type="submit"
                                        class="btn btn-success">@if(request('id',false)) @lang('rrm::base.update') @else @lang('rrm::base.create') @endif</button>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
@endsection

@section('css')
    <style>

    </style>
@endsection

@section('js')
    <script>

    </script>
@endsection
