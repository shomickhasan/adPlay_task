@if ($paginator->hasPages())
    <div class="shop-pagination-wrapper d-md-flex justify-content-between align-items-center">
        <div class="basic-pagination">
            <ul>
                @if ($paginator->onFirstPage())
                    <li class="disabled"><span><i class="fal fa-angle-left"></i></span></li>
                @else
                    <li><a href="{{ $paginator->previousPageUrl() }}"><i class="fal fa-angle-left"></i></a></li>
                @endif

                @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
                    <li class="{{ $paginator->currentPage() == $page ? 'active' : '' }}">
                        <a href="{{ $url }}">{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</a>
                    </li>
                @endforeach

                @if ($paginator->hasMorePages())
                    <li><a href="{{ $paginator->nextPageUrl() }}"><i class="fal fa-angle-right"></i></a></li>
                @else
                    <li class="disabled"><span><i class="fal fa-angle-right"></i></span></li>
                @endif
            </ul>
        </div>
        <div class="shop__header-left">
            <div class="show-text bottom">
                <span>Showing {{ $paginator->firstItem() }}–{{ $paginator->lastItem() }} of {{ $paginator->total() }} results</span>
            </div>
        </div>
    </div>
@endif
