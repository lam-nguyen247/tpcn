<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-5">@lang('Edit Category')</h4>
        <form method="POST" action="{{route('category.update', $category->id)}}" class="floating-labels mt-2">
            @csrf
            @method('PUT')
            <input type="hidden" name="master_category_id" value="{{$masterCategory->id}}" />
            <input type="hidden" name="master_category_name" value="{{$masterCategory->name}}" />
            <input type="hidden" name="id" value="{{$category->id}}">
            <input type="hidden" name="language" value="{{app()->getLocale()}}" />
            <x-input name="name" value="{{$category->name}}" label="Category Name" required />
            <x-select name="category_id" value="{{$category->category_id}}" label="Parent Category" :option-list="$categoryFlatList" />
            <x-textarea name="content" value="{{$category->content}}" label="Description" rows="3" />
            <button type="submit" class="btn btn-success waves-effect waves-light mr-2">@lang('Save')</button>
        </form>
    </div>
</div>
