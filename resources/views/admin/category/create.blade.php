<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-5">@lang('New Category')</h4>
        <form method="POST" action="{{route('category.store')}}" class="floating-labels mt-2">
            @csrf
            <input type="hidden" name="master_category_id" value="{{$masterCategory->id}}" />
            <input type="hidden" name="master_category_name" value="{{$masterCategory->name}}" />
            <input type="hidden" name="language" value="{{app()->getLocale()}}" />
            <x-input name="name" label="Category Name" required />
            <x-select name="category_id" label="Parent Category" :option-list="$categoryFlatList" />
            <x-textarea name="content" label="Description" rows="3" />
            <button type="submit" class="btn btn-success waves-effect waves-light mr-2">@lang('Save')</button>
        </form>
    </div>
</div>
