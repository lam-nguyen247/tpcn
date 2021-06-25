@extends('admin.layouts.app')

@section('title', 'Sản Phẩm')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-sm btn-outline-success float-right" href="{{ route('product.create') }}"><i class="fas fa-plus-circle"></i> Thêm sản phẩm</a>
                    <h4 class="card-title">Danh Sách Sản Phẩm</h4>
                    <h6 class="card-subtitle">&nbsp;</h6>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered display js-datatable w-100">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                @if(Route::has('product-category.index'))<th>Danh mục sản phẩm</th>@endif
                                <th>Tên Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Giá Khuyến Mãi</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($productList as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td><img src="{{asset($product->image)}}" width="80" /></td>
                                    @if(Route::has('product-category.index'))<td>{{$product->productCategory->name}}</td>@endif
                                    <td>{{$product->title}}</td>
                                    <td>
                                        <input id="price{{$product->id}}" onchange="updatePrice({{$product->id}})" type="number" min="1" pattern="[0-9]*" name="price{{$product->id}}" class="form-control " step="0.01"  min="0" value="{{old('price')??$product->price}}">
                                    </td>
                                    <td>
                                        <input id="sale{{$product->id}}" type="number" onchange="updatePrice({{$product->id}})" min="0" pattern="[0-9]*" name="sale{{$product->id}}" class="form-control " step="0.01" min="0"  value="{{old('sale')??$product->sale}}">
                                    </td>
                                    <td class="{{$product->status==1?'text-primary':'text-danger'}}">{{$product->statusString}}</td>
                                    <td>

                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
{{--                                            {{ route('admin.product.property', $product->id) }}--}}
{{--                                            <a href="#" class="text-inverse pr-2" data-toggle="tooltip" title="Cập nhật thuộc tính">--}}
{{--                                                <i class="fab fa-product-hunt"></i>--}}
{{--                                            </a>--}}
                                            <a href="{{ route('product.commentList', $product->id) }}" class="text-inverse pr-2" data-toggle="tooltip" title="Bình luận">
                                                <i class="ti-comments"></i>
                                            </a>
                                            <a href="{{ route('product.edit', $product->id) }}" class="text-inverse pr-2" data-toggle="tooltip" title="Chỉnh sửa">
                                                <i class="ti-marker-alt"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn p-0 text-inverse js-delete-sweetalert" title="Xóa" data-toggle="tooltip"><i class="ti-trash"></i></button>
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
    function updatePrice(id){
        if(id>0){
            let price = parseInt($("#price"+id).val());
            let sale = parseInt($("#sale"+id).val());
            if( price  <= sale){
                alert('Giá khuyến mãi phải nhỏ hơn giá gốc');
            }else{
                $.ajax({
                    type: 'POST',
                    url: '/admin/product/updatePrice/'+id,
                    data: {_token: '{{csrf_token()}}' ,id: id, price: price, sale: sale}
                }).done(function(res){
                })
            }

        }
    }

</script>
@endsection
