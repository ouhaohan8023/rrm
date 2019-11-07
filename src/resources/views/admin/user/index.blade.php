@extends('rrm::admin.layout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            @include('rrm::admin.layout.alert')
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        @include('rrm::admin.layout.table_header',['model'=>'rrm::user.model','create'=>'admin.user.create'])
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th><i class="fa fa-bullhorn"></i> @lang('rrm::user.name')</th>
                                <th><i class="fa fa-bullhorn"></i> @lang('rrm::user.email')</th>
                                <th><i class="fa fa-bullhorn"></i> @lang('rrm::user.role')</th>
                                <th><i class="fa fa-question-circle"></i> @lang('rrm::base.created_at')</th>
                                <th><i class="fa fa-bookmark"></i> @lang('rrm::base.updated_at')</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $v)
                                <tr>
                                    <td>{{$v['name']}}</td>
                                    <td>{{$v['email']}}</td>
                                    <td>{{$v->role}}</td>
                                    <td>{{$v['created_at']}}</td>
                                    <td>{{$v['updated_at']}}</td>
                                    <td>
                                        @can('admin.user.assignment')
                                            <a href="{{route('admin.user.assignment', ['id' => $v['id']])}}"
                                               class="btn btn-success btn-xs">@lang('rrm::base.assignment')@lang('rrm::role.model')</a>
                                        @endcan
                                        @can('admin.user.update')
                                            <a href="{{route('admin.user.update',['id'=>$v['id']])}}"
                                               class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                        @endcan
                                        @can('admin.user.delete')
                                            <button class="btn btn-danger btn-xs" data-toggle="modal" href="#myModal6"
                                                    onclick="deleteData({{$v['id']}},'{{$v['name']}}')"><i
                                                    class="fa fa-trash-o "></i>
                                            </button>
                                        @endcan
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

    @include('rrm::admin.layout.table_modal',['id'=>'myModal6','action'=>route('admin.user.delete'),'model'=>'rrm::user.model'])
@endsection

@section('css')
    <style>

    </style>
@endsection
