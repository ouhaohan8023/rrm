@extends('rrm::admin.layout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        @include('rrm::admin.layout.view_header',['model'=>'rrm::op-log.model'])
                        <div class="panel-body">
                            <form role="form">
                                @csrf
                                <div class="form-group">
                                    <label>@lang('rrm::op-log.name')</label>
                                    <input type="text" class="form-control" value="{{$data['name']}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>@lang('rrm::op-log.url')</label>
                                    <input type="text" class="form-control" value="{{$data['url']}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>@lang('rrm::op-log.ip')</label>
                                    <input type="text" class="form-control" value="{{$data['ip']}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>@lang('rrm::base.created_at')</label>
                                    <input type="text" class="form-control" value="{{$data['created_at']}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>@lang('rrm::op-log.data')</label>
                                    <textarea class="form-control" rows="15" disabled>{{$data['data']}}
                                    </textarea>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>
@endsection

@section('css')
    <style>

    </style>
@endsection

@section('js')
@endsection
