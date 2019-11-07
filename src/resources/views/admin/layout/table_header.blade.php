<header class="panel-heading">
    @lang('rrm::base.Controller',['model'=>__($model)])
    @can($create)
        <a href="{{route($create)}}" type="button" class="btn btn-success btn-table-right">@lang('rrm::base.create')</a>
    @endcan
</header>

@push('css')
    <style>
        .btn-table-right {
            float: right;
        }
    </style>
@endpush
