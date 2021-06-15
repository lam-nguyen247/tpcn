@extends('admin.layouts.app')

@section('title', 'Giải Đáp & Tư Vấn')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-sm btn-outline-success float-right" href="{{ route('question-answer.create') }}"><i class="fas fa-plus-circle"></i> Thêm giải đáp & Tư vấn</a>
                    <h4 class="card-title">Danh Sách Tư Vấn</h4>
                    <h6 class="card-subtitle">&nbsp;</h6>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered display js-datatable w-100">
                            <thead>
                            <tr>
                                <th></th>
                                @if(Route::has('product-category.index'))<th>Danh mục sản phẩm</th>@endif
                                <th>Tiêu Đề</th>
                                <th>Họ Tên</th>
                                <th>Email</th>
                                <th>Câu Hỏi</th>
                                <th>Giải Đáp</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($questionList as $question)
                                <tr>
                                    <td>{{$question->id}}</td>
                                    @if(Route::has('product-category.index'))<td>{{$question->productCategory->name ?? null}}</td>@endif
                                    <td>{!! $question->title  !!}</td>
                                    <td>{{$question->name}}</td>
                                    <td>{{$question->email}}</td>
                                    <td>{!! $question->question !!}</td>
                                    <td>{!! $question->answer !!}</td>
                                    <td>
                                        <a href="{{ route('question-answer.edit', $question->id) }}" class="text-inverse pr-2" data-toggle="tooltip" title="Chi Tiết">
                                            <i class="ti-comments"></i>
                                        </a>
                                        <a href="{{ route('question-answer.edit', $question->id) }}" class="text-inverse pr-2" data-toggle="tooltip" title="Chỉnh sửa">
                                            <i class="ti-marker-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
