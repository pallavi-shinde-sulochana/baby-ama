@if ($paginator->hasPages())
<div class="row mx-0 py-3 align-items-center">
    <div class="col-5">
        Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}
    </div>
    <div class="col-7 d-flex gap-2 align-items-center justify-content-end">
        @if ($paginator->onFirstPage())
            {{-- <a href="{{ $paginator->previousPageUrl() }}" aria-disabled="true" rel="prev" aria-label="@lang('pagination.previous')" class="disabled baby-btn-v1">Prev</a> --}}
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="baby-btn-v1">Prev</a>
        @endif
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="baby-btn-v1">Next</a>
            @else
                {{-- <a aria-disabled="true" aria-label="@lang('pagination.next')" class="baby-btn-v1 disabled">Next</a> --}}
            @endif
    </div>
</div>
@endif
