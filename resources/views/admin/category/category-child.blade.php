<li class="dd-item dd3-item" data-id="{{$category->id}}">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content">{{$category->name}}</div>
    @foreach($category->child as $category)
    <ol class="dd-list">
        @include('admin.category.category-child', $category)
    </ol>
    @endforeach
</li>
