@if ($paginator->hasPages())
    <nav class="flex mt-30">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())

            <a class="btn btn-white disabled"><i class="fa fa-arrow-left mr-4 fs-9"></i>Newer</a>
                
            @else
            <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-primary" ><i class="fa fa-arrow-left mr-4 fs-9"></i>Newer</a>
            @endif
            
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-primary" >Older<i class="fa fa-arrow-right ml-4 fs-9"></i></a>
            @else
            <a class="btn btn-white disabled">Older<i class="fa fa-arrow-right ml-4 fs-9"></i></a>
            @endif
        </ul>
    </nav>
@endif
