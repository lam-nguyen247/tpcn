@extends('admin.layouts.app')

@section('title', 'Danh Mục Sản Phẩm')
@section('content')

    @includeWhen(isset($productCategory), 'admin.productcategory.edit')
    @includeWhen(!isset($productCategory), 'admin.productcategory.create')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh Sách Danh Mục Sản Phẩm</h4>
                    <h6 class="card-subtitle">&nbsp;</h6>
                    <div class="table-responsive">
                        <table id="listCat" class="table table-striped table-bordered display w-100">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Tên</th>
                                <th>Trang chủ</th>
                                <th>Đường dẫn</th>
                                <th>Danh mục con</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($productCategoryList as $productCategory)
                            <tr>
                                <td>{{$productCategory->order_display}}</td>
                                <td>{{$productCategory->name}}</td>
                                <td>
                                    <label class="text-{{$productCategory->display_home==1?'success':'info'}}">
                                        {{$productCategory->display_home==1?'Hiển thị':'Không hiển thị'}}
                                    </label>
                                </td>
                                <td>{{$productCategory->slug}}</td>
                                <td>
                                    @if (count($productCategory->childs)>0)
                                        <table>
                                            <tr>
                                                <th></th>
                                                <th style="width:35%">Tên</th>
                                                <th style="width:20%">Trang chủ</th>
                                                <th style="width:35%">Đường dẫn</th>
                                                <th></th>
                                            </tr>
                                            @foreach ($productCategory->childs as $item)
                                            <tr>
                                                <td>{{$item->order_display}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>
                                                    <label class="text-{{$item->display_home==1?'success':'info'}}">
                                                        {{$item->display_home==1?'Hiển thị':'Không hiển thị'}}
                                                    </label>
                                                </td>
                                                <td>{{$item->slug}}</td>
                                                <td>
                                                    <form action="{{ route('product-category.destroy', $item->id) }}" method="POST">
                                                        <a href="{{ route('product-category.edit', $item->id) }}" class="text-inverse pr-2" data-toggle="tooltip" title="Chỉnh sửa">
                                                            <i class="ti-marker-alt"></i>
                                                        </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn p-0 text-inverse" title="Xóa" data-toggle="tooltip"><i class="ti-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    @else
                                     Không
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('product-category.destroy', $productCategory->id) }}" method="POST">
                                        <a href="{{ route('product-category.edit', $productCategory->id) }}" class="text-inverse pr-2" data-toggle="tooltip" title="Chỉnh sửa">
                                            <i class="ti-marker-alt"></i>
                                        </a>
                                        {{--{{ route('admin.product-category.order', $productCategory->id) }}--}}
                                        <a href="#" class="text-inverse pr-2" data-toggle="tooltip" title="Sắp xếp danh mục con">
                                            <i class="ti-layers-alt"></i>
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
        $(document).ready(function() {
            $('#listCat').DataTable( {
                "order": [[ 0, "asc" ]]
            } );
        } );
        let properties = new Array();
        for( let i = 0 ; i < $('.pro').length; i++){
            properties.push($(".pro").eq(i).val());
        }
        function addProperty(){
            let val = $("#property").val();
            if(val != '' && !properties.includes(val)){
                properties.push(val);
                let str = `
                <div class="col-md-2">
                    <div class="input-group mb-3">
                        <input type="text" name="properties[]" class="form-control" value="${val}" placeholder="" aria-label="" aria-describedby="basic-addon1">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="button" onclick="removeProperty(this)">Xóa</button>
                        </div>
                    </div>
                </div>
                `;
                $("#properties").append(str);
            }
            $("#property").val('');
            $("#property").focus();
        }
        function removeProperty(ele){
            $(ele).parent().parent().parent().remove();
        }

        function isParent(){
            if($('#parent_id').val() != 0){
               $("#pro").css('display','none');
            }else{
                $("#pro").css('display','block');
            }
        }
        isParent();
    </script>

    {{-- <script>
        function isHome(){
            console.log(1)
            if($('#display_home').val() == 1){
                $("#banner").attr('required', 'true');
            }else{
                $("#banner").removeAttr('required')
            }
        }

        function isParent(){
            console.log(1)
            if($('#parent_id').val() != 0){
                $("#banner").attr('required', 'true');
            }else{
                $("#banner").removeAttr('required')
            }
        }
        $(document).ready(function(){
            isHome();
            isParent();
        })
    </script> --}}
@endsection
