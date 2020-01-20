@if(isset($append))
    {{ $data->appends($append)->links('rrm::vendor.pagination.default') }}
@else
    {{ $data->links('rrm::vendor.pagination.default') }}
@endif
