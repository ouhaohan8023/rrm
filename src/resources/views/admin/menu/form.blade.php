@extends('rrm::admin.layout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        @if(request('id',false))
                            @include('rrm::admin.layout.update_header',['model'=>'rrm::menu.model'])
                        @else
                            @include('rrm::admin.layout.create_header',['model'=>'rrm::menu.model'])
                        @endif
                        <div class="panel-body">
                            <form role="form" method="post" action="{{request('id',false)?route('admin.menu.update',['id' => request('id')]):route('admin.menu.create')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">@lang('rrm::menu.model')</label>
                                    <input type="text" class="form-control" id="name" @isset($data['url']) value="{{__('rrm::permission.'.$data['url'])}}" @endisset>
                                </div>
                                <div class="form-group">
                                    <label for="icon">@lang('rrm::menu.icon')</label>
                                    <input type="text" class="form-control" id="icon" name="icon" @isset($data['icon']) value="{{$data['icon']}}" @endisset>
                                </div>
                                <div class="form-group">
                                    <label>@lang('rrm::menu.permission')</label>
                                    <div>
                                        <select name="url" multiple="" class="form-control" style="height: 350px"
                                                onchange="autoName()" id="select">
                                            @foreach($permission as $k => $v)
                                                <option value="{{$v->name}}" @if(isset($data) && Arr::get($data,'url') == $v->name) selected @endif>{{__('rrm::permission.'.$v->name)}}【{{$v->name}}】</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">
                                    @if(request('id',false)) @lang('rrm::base.update') @else @lang('rrm::base.create') @endif
                                </button>
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
      function autoName() {
        var name = $("#select option:selected").text();
        name = name.slice(0,name.indexOf('【'))
        $("#name").val(name);
      }
    </script>
@endsection
