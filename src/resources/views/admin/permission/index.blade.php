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
                            @lang('rrm::base.Controller',['model'=>__('rrm::permission.model')])
                            <a href="{{route('admin.permission.reload')}}" type="button" class="btn btn-success btn-table-right">@lang('rrm::permission.admin.permission.reload')</a>
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th><i class="fa fa-bullhorn"></i> @lang('rrm::permission.name')</th>
                                <th><i class="fa fa-bullhorn"></i> @lang('rrm::permission.url')</th>
                                <th><i class="fa fa-question-circle"></i> @lang('rrm::base.created_at')</th>
                                <th><i class="fa fa-bookmark"></i> @lang('rrm::base.updated_at')</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $v)
                                <tr>
                                  <td><a href="#">{{__('rrm::permission.'.$v['name'])}}</a></td>
                                  <td><a href="#">{{$v['name']}}</a></td>
                                    <td>{{$v['created_at']}}</td>
                                    <td>{{$v['updated_at']}}</td>
                                    <td>
                                        <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                        <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger btn-xs" data-toggle="modal" href="#myModal6"
                                                onclick="deleteData({{$v['id']}},'{{__('role.'.$v['name'])}}')"><i class="fa fa-trash-o "></i>
                                        </button>
                                    </td>
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

    @include('rrm::admin.layout.table_modal',['id'=>'myModal6','action'=>route('admin.permission.delete'),'model'=>'rrm::permission.model'])
@endsection

@section('css')
    <style>
        .refresh {
            float: right;
        }
        .bottom-bar {
            margin-top: 20px;
        }
        .btn-table-right {
            float: right;
        }
    </style>
@endsection
