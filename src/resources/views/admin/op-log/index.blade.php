@extends('rrm::admin.layout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            @if (Session::has('success'))
                @include('rrm::admin.layout.success',['msg'=>Session::get('success')])
            @endif
            @if (Session::has('error'))
                @include('rrm::admin.layout.error',['msg'=>Session::get('error')])
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            @lang('rrm::base.Controller',['model'=>__('rrm::op-log.model')])
                            <a href="{{route('admin.op-log.clear')}}" type="button"
                               class="btn btn-success btn-table-right">@lang('rrm::permission.admin.op-log.clear')</a>
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th><i class="fa fa-bullhorn"></i> @lang('rrm::op-log.name')</th>
                                <th><i class="fa fa-bullhorn"></i> @lang('rrm::op-log.url')</th>
                                <th><i class="fa fa-bullhorn"></i> @lang('rrm::op-log.ip')</th>
                                <th><i class="fa fa-bullhorn"></i> @lang('rrm::op-log.data')</th>
                                <th><i class="fa fa-question-circle"></i> @lang('rrm::base.created_at')</th>
                                <th><i class="fa fa-bookmark"></i> @lang('rrm::base.updated_at')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $v)
                                <tr>
                                    <td>{{$v['name']}}</td>
                                    <td>{{$v['url']}}</td>
                                    <td>{{$v['ip']}}</td>
                                    <td><a href="{{route('admin.op-log.view',['id'=>$v['id']])}}">{{$v['data']}}</a></td>
                                    <td>{{$v['created_at']}}</td>
                                    <td>{{$v['updated_at']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @include('rrm::admin.layout.pagination',['data'=>$data])
                    </section>
                </div>
            </div>
        </section>
    </section>
@endsection

@section('css')
    <style>
        .btn-table-right {
            float: right;
        }
    </style>
@endsection
