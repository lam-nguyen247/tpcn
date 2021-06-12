@extends('admin.layouts.app')

@section('title', __('Categories'))

@section('content')
    <div class="row">
        <div class="col-md-5">
            @includeWhen(isset($category), 'admin.category.edit')
            @includeWhen(!isset($category), 'admin.category.create')
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">@lang('All Categories')</h4>
                    <div class="myadmin-dd-empty dd js-nestable">
                        <ol class="dd-list">
                            @forelse($categoryList as $category)
                                @include('admin.category.show', $category)
                            @empty
                            @endforelse
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="/js/admin/jquery.nestable.js"></script>
    <script>
        $(function () {
            let updateCategoryList = function (e) {
                let $categoryList = e.length ? e : $(e.target);
                let formData = new FormData();
                formData.append('_token', '{{csrf_token()}}');
                formData.append('categoryList', JSON.stringify($categoryList.nestable('serialize')));
                fetch('/admin/category/order', {method: 'POST', body: formData})
                    .then(response => response.text())
                    .then(data => {
                        toastr.info(data, $('meta[name=title]').attr("content"), {timeOut: 2000});
                    });
            };

            $('.js-nestable').nestable({group: 1}).on('change', updateCategoryList);
        });
    </script>
@endsection
