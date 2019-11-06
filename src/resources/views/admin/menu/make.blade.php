@extends('rrm::admin.layout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        @include('rrm::admin.layout.update_header',['model'=>'rrm::menu.model'])
                        <div class="panel-body">
                            @if (Session::has('success'))
                                @include('rrm::admin.layout.success',['msg'=>Session::get('success')])
                            @endif
                            @if (Session::has('error'))
                                @include('rrm::admin.layout.error',['msg'=>Session::get('error')])
                            @endif
                            <div class="row">
                                <div class="text-center" id="nestable_list_menu">
                                    <button type="button" class="btn btn-success" data-action="expand-all">
                                        @lang('rrm::menu.expand all')
                                    </button>
                                    <button type="button" class="btn btn-warning" data-action="collapse-all">
                                        @lang('rrm::menu.collapse all')
                                    </button>
                                </div>
                                <br/>
                                <div class="col-lg-offset-3 col-lg-6">
                                    <div class="dd" id="nestable_list_1">
                                        <ol class="dd-list">
                                            {!! $data !!}
                                        </ol>
                                    </div>
                                </div>
                            </div>
                                <br/>
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method="post" action="{{route('admin.menu.make')}}">
                                        @csrf
                                            <textarea name="data" id="nestable_list_1_output"
                                                      class=" col-lg-12 form-control" rows="10"></textarea>
                                        <button type="submit" class="btn btn-success" style="margin-top: 20px">@lang('rrm::base.update')</button>
                                        <a href="{{route('admin.menu.clear')}}" type="button" class="btn btn-danger" style="margin-top: 20px">@lang('rrm::base.clear')</a>
                                    </form>
                                </div>
                            </div>
                            <br>
                        </div>
                    </section>
                </div>
            </div>

        </section>
    </section>

    @include('rrm::admin.layout.table_modal',['id'=>'myModal6','action'=>route('admin.menu.delete'),'model'=>'rrm::menu.model'])
@endsection

@section('css')

    <link rel="stylesheet" type="text/css" href="{{asset('admin_panel/assets/nestable/jquery.nestable.css')}}"/>
    <style>

    </style>
@endsection

@section('js')
    <script src="{{asset('admin_panel/assets/nestable/jquery.nestable.js')}}"></script>
    <script src="{{asset('admin_panel/js/nestable.js?v=20191029')}}"></script>
@endsection
