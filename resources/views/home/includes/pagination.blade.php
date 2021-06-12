<div class="grid-news--btn">
    <div class="btn-normal">
        @if ($paginator->hasPages())
            @if (!$paginator->onFirstPage())
                <a href="{{ $paginator->previousPageUrl() }}" title="@lang('Previous page')">
                    <span class="btn-normal__title">@lang('Previous page')</span>
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" title="@lang('Next page')">
                    <span class="btn-normal__title">@lang('Next page')</span>
                    <svg class="icon"><use xlink:href="#icon-arrow"></use></svg>
                </a>
            @endif
        @endif
    </div>
</div>
