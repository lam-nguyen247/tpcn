@extends('admin.layouts.app')

@section('title', 'Bình luận')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-sm btn-outline-success float-right" href="{{ route('comment.create') }}"><i class="fas fa-plus-circle"></i> @lang('Add New')</a>
                    <h4 class="card-title">Danh sách bình luận</h4>
                    <h6 class="card-subtitle">&nbsp;</h6>
                    <div class="table-responsive">
                        <table class="table table-striped table-bcommented display js-datatable w-100">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Sản phẩm</th>
                                <th>Đánh giá</th>
                                <th>Họ tên</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Nội dung</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($commentList as $comment)
                                <tr>
                                    <td>{{$comment->id}}</td>
                                    <td><img src="{{$comment->product->image}}" width="80" /></td>
                                    <td>{{$comment->score}}<i class="ti-star"></i></td>
                                    <td>{{$comment->name}}</td>
                                    <td>{{$comment->phone}}</td>
                                    <td>{{$comment->email}}</td>
                                    <td>{{$comment->content}}</td>
                                    <td>
                                        <select onchange="updateStatus({{$comment->id}})" style="color: {{$comment->color}}"  name="status_{{$comment->id}}" id="status_{{$comment->id}}">
                                            <option style="color:red" {{$comment->status==1?'selected':''}} value="1">Hiện</option>
                                            <option style="color:blue" {{$comment->status==0?'selected':''}} value="0">Ẩn</option>
                                        </select>
                                    </td>
                                    <td>
                                        <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                                            <a href="{{ route('comment.edit', $comment->id) }}" class="text-inverse pr-2" data-toggle="tooltip" title="@lang('Edit')">
                                                <i class="ti-marker-alt"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn p-0 text-inverse js-delete-sweetalert" data-toggle="tooltip" title="@lang('Delete')">
                                                <i class="ti-trash"></i>
                                            </button>
                                        </form>
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
    <script>
        function updateStatus(id){
            if(id>0){
                $.ajax({
                    type: 'POST',
                    url: '/admin/comment/updateStatus/'+id,
                    data: {_token: '{{csrf_token()}}' ,id: id, status: $("#status_"+id).val()}
                }).done(function(res){
                    $("#status_"+id).css('color',res);
                })
            }
        }
    </script>
@endsection
