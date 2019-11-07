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
                        @include('rrm::admin.layout.table_header',['model'=>'rrm::menu.model','create'=>route('admin.menu.create')])
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th><i class="fa fa-bullhorn"></i> @lang('rrm::menu.name')</th>
                                <th><i class="fa fa-asterisk"></i> @lang('rrm::menu.icon')</th>
                                <th><i class="fa fa-question-circle"></i> @lang('rrm::base.created_at')</th>
                                <th><i class="fa fa-bookmark"></i> @lang('rrm::base.updated_at')</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $v)
                                <tr>
                                    <td><a href="#">{{__('rrm::permission.'.$v['url'])}}</a></td>
                                    <td><i class="{{$v['icon']}}"></i> &nbsp; {{$v['icon']}}</td>
                                    <td>{{$v['created_at']}}</td>
                                    <td>{{$v['updated_at']}}</td>
                                    <td>
                                        <a href="{{route('admin.menu.update',['id' => $v['id']])}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-xs" data-toggle="modal" href="#myModal6"
                                                onclick="deleteData({{$v['id']}},'【{{$v['name']}}】')"><i
                                                class="fa fa-trash-o "></i>
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

    @include('rrm::admin.layout.table_modal',['id'=>'myModal6','action'=>route('admin.menu.delete'),'model'=>'rrm::menu.model'])
@endsection

@section('css')
    <style>

    </style>
@endsection
