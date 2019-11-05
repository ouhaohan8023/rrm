<header class="panel-heading">
    @lang('rrm::base.Controller',['model'=>__($model)])
    <a href="{{$create}}" type="button" class="btn btn-success btn-table-right">@lang('rrm::base.create')</a>
</header>

@push('css')
    <style>
        .btn-table-right {
            float: right;
        }
    </style>
@endpush
