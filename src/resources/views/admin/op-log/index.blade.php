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
                            搜索
                        </header>
                        <div class="panel-body">
                            <form class="form-inline" role="form" action="{{route('admin.op-log.index')}}" method="get">
                                <div class="form-group">
                                    <label class="sr-only">关键词</label>
                                    <input type="text" name="keyword" class="form-control" placeholder="关键词"
                                           value="{{old('keyword')}}">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only">管理员名称</label>
                                    <input type="text" name="name" class="form-control" placeholder="管理员名称"
                                           value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-5"
                                           style="height: 34px;line-height: 34px">开始时间</label>
                                    <div class="col-md-3 col-xs-6">
                                        <input
                                            class="form-control form-control-inline input-medium default-date-picker1"
                                            name="start" size="16" type="text" value="{{old('start')}}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-4"
                                           style="height: 34px;line-height: 34px">结束日期</label>
                                    <div class="col-md-3 col-xs-6">
                                        <input
                                            class="form-control form-control-inline input-medium default-date-picker2"
                                            name="stop" size="16" type="text" value="{{old('stop')}}"/>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">查找</button>
                            </form>

                        </div>
                    </section>
                </div>
            </div>

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
                                    <td><a href="{{route('admin.op-log.view',['id'=>$v['id']])}}">{{$v['data']}}</a>
                                    </td>
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
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin_panel\assets\bootstrap-datetimepicker\css\datetimepicker.css')}}"/>
    <style>
        .btn-table-right {
            float: right;
        }
    </style>
@endsection

@section('js')
    <script src="{{asset('admin_panel\assets\bootstrap-datetimepicker\js\bootstrap-datetimepicker.js')}}"></script>

    <script>
        $('.default-date-picker1').datetimepicker({
            format: 'yyyy-mm-dd hh:ii:ss',
            autoclose: true
        });
        $('.default-date-picker2').datetimepicker({
            format: 'yyyy-mm-dd hh:ii:ss',
            autoclose: true
        });
    </script>
@endsection
