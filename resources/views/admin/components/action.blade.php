<form action="{{ route($route . '.destroy', $id) }}" method="POST">
    @if(!$disabledEdit)
    <a href="{{ route($route . '.edit', $id) }}" class="text-inverse pr-2"
       data-toggle="tooltip" title="@lang('Edit')">
        <i class="ti-marker-alt"></i>
    </a>
    @endif

    @if(!$disabledDelete)
    @csrf
    @method('DELETE')
    <button type="submit" class="btn p-0 text-inverse js-delete-sweetalert"
            data-toggle="tooltip" title="@lang('Delete')">
        <i class="ti-trash"></i>
    </button>
    @endif
</form>
