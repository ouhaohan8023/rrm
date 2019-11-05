@extends('rrm::admin.layout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        @include('rrm::admin.layout.create_header',['model'=>'rrm::menu.model'])
                        <div class="panel-body">
                            <form role="form" method="post" action="{{request('id',false)?route('admin.menu.update',['id' => request('id')]):route('admin.menu.create')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="text">@lang('rrm::menu.model')</label>
                                    <input type="text" class="form-control" id="text" name="name" @isset($data['name']) value="{{$data['name']}}" @endisset>
                                </div>
                                <div class="form-group">
                                    <label for="text">@lang('rrm::menu.icon')</label>
                                    <input type="text" class="form-control" id="text" name="icon" @isset($data['icon']) value="{{$data['icon']}}" @endisset>
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
        $("input[name='name']").val(name);
      }
    </script>
@endsection
