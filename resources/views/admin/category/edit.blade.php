<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-5">@lang('Edit Category')</h4>
        <form method="POST" action="{{route('category.update', $category->id)}}" class="floating-labels mt-2" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-9">
                <div class="form-group mb-5">
                    <span>Ảnh bìa trang chủ</span>
                    <input type="file" class="form-control js-dropify" id="banner" name="banner" data-default-file="{{ is_null($category->banner) ? '' : url($category->banner) }}" accept="image/*" data-show-remove="false"/>
                </div>
            </div>
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
