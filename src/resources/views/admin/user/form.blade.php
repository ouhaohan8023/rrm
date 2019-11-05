@extends('rrm::admin.layout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        @include('rrm::admin.layout.create_header',['model'=>'rrm::user.model'])
                        <div class="panel-body">
                            <form role="form" method="post"
                                  action="{{request('id',false)?route('admin.user.update',['id' => request('id')]):route('admin.user.create')}}"
                                  enctype="multipart/form-data"
                            >
                                @csrf
                                <div class="form-group @error('name') has-error @enderror">
                                    <label for="name">@lang('rrm::user.name')</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           @if(old('name')) value="{{old('name')}}"
                                           @endif @isset($data['name']) value="{{$data['name']}}" @endisset >
                                    @error('name')
                                    <span class="help-block" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group @error('email') has-error @enderror">
                                    <label for="email">@lang('rrm::user.email')</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           @if(old('email')) value="{{old('email')}}"
                                           @endif @isset($data['email']) value="{{$data['email']}}" @endisset>
                                    @error('email')
                                    <span class="help-block" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group @error('password') has-error @enderror">
                                    <label for="password">@lang('rrm::user.password') @if(request('id'))
                                            【@lang("user.don't need to enter if don't change")】 @endif</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    @error('password')
                                    <span class="help-block" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group @error('password') has-error @enderror">
                                    <label for="confirm_password">@lang('rrm::user.confirm password')</label>
                                    <input type="password" class="form-control" id="confirm_password"
                                           name="password_confirmation">
                                </div>

                                <div class="form-group last">
                                    <label class="control-label col-md-3">@lang('rrm::user.avatar')</label>
                                    <div class="col-md-9">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img
                                                    @if(isset($data['avatar']))
                                                    src="{{asset('storage/'.$data['avatar'])}}"
                                                    @else
                                                    src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                                    @endif
                                                    alt=""/>
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail"
                                                 style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                   <span class="btn btn-white btn-file">
                                                   <span class="fileupload-new"><i class="fa fa-paper-clip"></i> @lang('rrm::user.choose image')</span>
                                                   <span class="fileupload-exists"><i class="fa fa-undo"></i> @lang('rrm::user.change')</span>
                                                   <input type="file" class="default" name="avatar"/>
                                                   </span>
                                                <a href="#" class="btn btn-danger fileupload-exists"
                                                   data-dismiss="fileupload"><i
                                                        class="fa fa-trash"></i> @lang('rrm::user.remove')</a>
                                            </div>
                                            @error('avatar')
                                            <span class="help-block" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"
                                        class="btn btn-success">@if(request('id',false)) @lang('rrm::base.update') @else @lang('rrm::base.create') @endif</button>
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
    <link rel="stylesheet" type="text/css" href="{{asset('assets/bootstrap-fileupload/bootstrap-fileupload.css')}}"/>

    <style>

    </style>
@endsection

@section('js')
    <script type="text/javascript"
            src="{{asset('assets/bootstrap-fileupload/bootstrap-fileupload.js?20191036')}}"></script>
    <script>

    </script>
@endsection
