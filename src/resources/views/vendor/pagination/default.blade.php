@if ($paginator->hasPages())
    <div class="text-center">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;&lsaquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;&rsaquo;</a>
                </li>
                <li>
                    <input class="jump-pagination" id="pagination" value="{{$paginator->currentPage()}}" type="number"
                           style="height: 35px;line-height: 35px;margin-left: 10px;width: 50px">
                </li>
                <li>
                    <button id="jumpPagination" type="button" class="btn btn-success" onclick="var url = $('#hideUrl').val();
                    url = url.substr(0, url.length - 1);
                    var page = $('#pagination').val();
                    page = page === ''?1:page
                    url = url + page;
                    window.location.href = url;">跳转
                    </button>
                </li>
                <li class="hide"><input id="hideUrl" value="{{$paginator->url(1)}}"></li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;&rsaquo;</span>
                </li>
            @endif
        </ul>
    </div>
@endif
