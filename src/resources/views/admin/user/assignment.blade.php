@extends('rrm::admin.layout')

@section('content')
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-md-12">
          @include('rrm::admin.layout.alert')
          <section class="panel">
            <header class="panel-heading">
              @lang('rrm::user.assignment role for',['user'=>$user['name']])
              <span class="tools pull-right">
                            {{--<a href="javascript:;" class="fa fa-chevron-down"></a>--}}
                {{--<a href="javascript:;" class="fa fa-times"></a>--}}
                          </span>
            </header>
            <div class="panel-body">
              <form action="{{route('admin.user.assignment', ['id'=>$id])}}" class="form-horizontal tasi-form"
                    method="post">
                @csrf
                <div class="form-group">
                  <div class="panel panel-warning col-md-3">
                    <div class="panel-heading">@lang('rrm::base.how to work')</div>
                    <div class="panel-body">
                      @lang('rrm::help.please click the role that you want to assign in the left box')
                    </div>
                  </div>
                  <div class="col-md-9">
                    <select multiple="multiple" class="multi-select" id="my_multi_select1"
                            name="roles[]">
                      @foreach($select as $s1)
                        <option value="{{$s1}}" selected>{{__('rrm::sys.role.'.$s1)}}</option>
                      @endforeach
                      @foreach($no_select as $s2)
                        <option value="{{$s2}}">{{__('rrm::sys.role.'.$s2)}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <button type="submit" class="btn btn-info button-next">@lang('rrm::base.confirm')</button>
              </form>
            </div>
          </section>
        </div>
      </div>
    </section>
  </section>

@endsection

@section('css')
  <link rel="stylesheet" type="text/css" href="{{asset('assets/jquery-multi-select/css/multi-select.css')}}"/>
@endsection
@section('js')
  <script type="text/javascript" src="{{asset('assets/jquery-multi-select/js/jquery.multi-select.js')}}"></script>
  <script>
		$('#my_multi_select1').multiSelect();
  </script>
@endsection
