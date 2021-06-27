@extends('admin.layouts.app')
@section('title', 'Cập Nhật Hỏi Đáp')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('question-answer.store')}}" class="floating-labels mt-4" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-xl-12">
                                <div class="form-group mb-5">
                                    <input id="name" type="text" name="name" value="" class="form-control">
                                    <span class="bar"></span>
                                    <label for="name">Họ Tên</label>
                                </div>
                                <div class="form-group mb-5">
                                    <input id="email" type="text" name="email" value="" class="form-control">
                                    <span class="bar"></span>
                                    <label for="email">Email</label>
                                </div>
                                @if(Route::has('product-category.index'))
                                <div class="form-group mb-12">
                                    <select class="form-control p-0" name="product_category_id" id="product_category">
                                        @forelse($productCategoryList as $category)
                                            <option data-parent="{{$category->parent_id}}" value="{{$category->id}}">{{$category->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    <span class="bar"></span>
                                    <label for="category">Danh Mục Sản Phẩm</label>
                                </div>
                                @endif
                                <div class="form-group mb-5">
                                    <span>Ảnh bìa trang chủ</span>
                                    <input type="file" class="form-control js-dropify" id="image" name="image" accept="image/*" data-show-remove="false" required />
                                </div>
                                <div class="form-group">
                                    <span for="title">Tiêu Đề</span>
                                    <textarea id="title" name="title" class="form-material editer"></textarea>
                                </div>
                                <div class="form-group">
                                    <span for="question">Câu Hỏi</span>
                                    <textarea id="question" name="question" class="form-material editer"></textarea>
                                </div>
                                <div class="form-group">
                                    <span for="answer">Tư Vấn</span>
                                    <textarea id="answer" name="answer" class="form-material editer"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" id="save" class="btn btn-success waves-effect waves-light mr-2 mt-5">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .card-header {
            z-index: 0 !important;
        }
    </style>
@endsection

@section('js')
<script>
    $('.editer').summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ],
        followingToolbar: false,
        height: 300, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: false // set focus to editable area after initializing summernote
    });
</script>
@endsection

