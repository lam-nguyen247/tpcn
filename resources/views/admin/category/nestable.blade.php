<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">@lang('New Category')</h4>
                <form method="POST" action="{{route('category.store')}}" class="floating-labels mt-2">
                    @csrf
                    <x-input name="name" label="Category Name" required />
                    <x-select name="parent_id" label="Parent Category" :option-list="$categoryList" />
                    <x-textarea name="content" label="Description" rows="3" />
                    <button type="submit" class="btn btn-success waves-effect waves-light mr-2">@lang('Save')</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Nestable2</h4>
                <div class="myadmin-dd-empty dd js-nestable">
                    <ol class="dd-list">
                        @forelse($categoryList as $category)
                            @include('admin.category.category-child', $category)
                        @empty
                        @endforelse
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')
    <script src="/js/admin/jquery.nestable.js"></script>
    <script>
        $(function () {
            let updateCategoryList = function (e) {
                let list = e.length ? e : $(e.target);
                let categoryList = list.data('categoryList');
                if (window.JSON) {
                    let json = window.JSON.stringify(list.nestable('serialize'));
                    categoryList.val(json);
                    let formData = new FormData();
                    formData.append('_token', '{{csrf_token()}}');
                    fetch('/admin/category/order', {method: 'POST', body: formData})
                        .then(response => response.text())
                        .then(data => {
                            toastr.info(data, $('meta[name=title]').attr("content"), {timeOut: 2000});
                        });
                }
            };

            $('.js-nestable').nestable({
                group: 1
            }).on('change', updateCategoryList);
            updateCategoryList($('.js-nestable').data('categoryList', $('.js-nestable')));
        });
    </script>
@endsection
