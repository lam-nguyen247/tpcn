@extends('admin.layouts.app')

@section('title', 'Sắp Xếp Danh Mục Sản Phẩm')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh Sách Danh Mục Sản Phẩm</h4>
                    <h6 class="card-subtitle">&nbsp;</h6>
                    <div class="table-responsive">
                        <form action="{{ route('admin.product-category.doOrder') }}" method="POST">
                        <table class="table table-striped table-bordered display w-100">
                            <thead>
                            <tr>
                                <th>Thứ tự</th>
                                <th>Tên Danh Mục</th>
                            </tr>
                            </thead>
                            <tbody id='listOrder'>
                            @csrf
                            @forelse($product_categoryList as $product_category)
                                <tr>
                                    <input type="hidden" name="id[]" value={{$product_category->id}}>
                                    <td>{{$product_category->order_display}}</td>
                                    <td>{{$product_category->name}}</td>
                                </tr>
                            @empty
                            @endforelse
                           
                            </tbody>

                          
                        </table>
                        <button type="submit" class="btn btn-success waves-effect waves-light mr-2">Lưu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

<script src="/js/admin/Sortable.js"></script>
<script>
    var options = {
        group: 'share',
        animation: 100
        };

        events = [
        'onChoose',
        'onStart',
        'onEnd',
        'onAdd',
        'onUpdate',
        'onSort',
        'onRemove',
        'onChange',
        'onUnchoose'
        ].forEach(function (name) {
        options[name] = function (evt) {
            
        };
        });
        Sortable.create(listOrder, options);
</script>
@endsection
