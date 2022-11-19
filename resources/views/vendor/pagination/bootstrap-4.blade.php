@if ($paginator->hasPages())
    <nav>
        <ul class="pagination mt-30 justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a class="btn btn-dark" href="#"><i class="fa fa-arrow-left fs-9 mr-4"></i><span class="" aria-hidden="true"></span></a>
                </li>
            @else
                <li class="page-item">
                    <a class="btn btn-primary" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="fa fa-arrow-left fs-9 mr-4"></i><span class="" aria-hidden="true"></span></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item "><a class="page-link bg-dark" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="btn btn-primary" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><span class="" aria-hidden="true"></span> <i class="fa fa-arrow-right fs-9 ml-4"></i></a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a class="btn btn-dark" href="#"> <span class="" aria-hidden="true"></span> <i class="fa fa-arrow-right fs-9 ml-4"></i></a>
                </li>
            @endif
        </ul>
    </nav>
@endif


