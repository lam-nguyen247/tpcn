@extends('admin.layouts.app')
<?php
    function getTitleById($id){
        $title = '';
        foreach(session('productList') as $item){
            if($item->id == $id){
                return $title = $item->title;
            }
        }
        return $title;
    }
?>
@section('title', 'Sửa sản phẩm')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('product.update', $product->id)}}" class="floating-labels mt-4" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-xl-3">
                                <div class="form-group mb-5">
                                    <input type="file" class="form-control js-dropify" name="file" accept="image/*" data-default-file="{{$product->image}}" data-show-remove="false" />
                                </div>
                                @if(Route::has('product-category.index'))
                                <div class="form-group mb-5">
                                    <select class="form-control p-0" name="product_category_id" id="product_category" onchange="selectCategory()" required>
                                        @forelse($productCategoryList as $category)
                                            <option data-parent="{{$category->parent_id}}" value="{{$category->id}}" @if($category->id == $product->product_category_id) selected @endif>{{$category->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    <span class="bar"></span>
                                    <label for="category">Danh Mục Sản Phẩm</label>
                                </div>
                                @endif
                                <div class="form-group focused  mb-5 @error('code') has-error @enderror">
                                    <input id="code" type="text" name="code" class="form-control @error('code') is-invalid @enderror" value="{{old('code')??$product->code}}" required>
                                    <span class="bar"></span>
                                    <label for="code">Mã sản phẩm</label>
                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group focused  mb-5 @error('price') has-error @enderror">
                                    <input id="price" type="number" onchange="changePrice()" min="1000" name="price" class="form-control " step="1000"  min="0" value="{{old('price')??$product->price}}">
                                    <span class="bar"></span>
                                    <label for="price">Giá gốc</label>
                                </div>
                                <div class="form-group focused  mb-5 @error('sale') has-error @enderror">
                                    <input id="sale" type="number" onchange="changePrice()"  min="0" name="sale" class="form-control " step="1000" min="0"  value="{{old('sale')??$product->sale}}">
                                    <span class="bar"></span>
                                    <label for="sale">Giá khuyến mãi</label>
                                </div>
                                <div class="form-group focused  mb-5 @error('purchase') has-error @enderror">
                                    <input id="purchase" type="number" min="0" pattern="[0-9]*" name="purchase" class="form-control " value="{{old('purchase')??$product->purchase}}">
                                    <span class="bar"></span>
                                    <label for="purchase">Lượt mua</label>
                                </div>
                                <div class="form-group focused  mb-5 @error('qty') has-error @enderror">
                                    <input id="qty" type="number" min="0" pattern="[0-9]*" name="qty" class="form-control " value="{{old('qty')??$product->qty}}">
                                    <span class="bar"></span>
                                    <label for="qty">Số lượng trong kho</label>
                                </div>
                                <div class="form-group mb-5 @error('status') has-error @enderror">
                                    <p>Trạng thái</p>
                                    <select class="form-control p-0" name="status" id="status" required>
                                        <option value="1" @if(1 == $product->status) selected @endif>Hiển thị</option>
                                        <option value="0" @if(0 == $product->status) selected @endif>Ẩn</option>
                                    </select>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8 col-xl-9 d-flex ">
                                <div class="card card-body px-0 mb-0">
                                    <div class="form-group focused mb-5 @error('title') has-error @enderror">
                                        <input id="title" type="text"  maxlength="190" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title') ?? $product->title}}" required>
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        <span class="bar"></span>
                                        <label for="title">Tên Sản Phẩm</label>
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <span for="sort_description">Mô tả ngắn</span>
                                        <textarea id="sort_description" name="sort_description" class="form-material">{{$product->sort_description}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xl-12" id="list_image">
                            <div style="margin-top : 20px; margin-bottom:20px;">
                                <div class="btn_action_device" id="btn">
                                    <p class="hid_error group_btn_multi_image" id="group_btn_multi_image_1">
                                        <label class="lb_multi_image btn btn-success" for="input_multi_image_1" id="btn_multi_image_1">Thêm album</label>
                                        <input class="btn_multi_image"  style="opacity:0" onchange="handleFiles(this.files)" id="input_multi_image_1" name="multi_img_device_1[]" type="file" multiple  accept="image/x-png,image/gif,image/jpeg"/>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @php
                            $album = json_decode($product->album);
                        @endphp
                        <input type="hidden" id="list_remove" name="list_remove" value=''>
                        <input type="hidden" name="number_device" id="number_device" value="{{count($album) ?? 0}}">
                        <div class="col-sm-12 col-md-12 col-xl-12 sortable">
                            <ul id="sortable">
                                <li class="sab-item sab-item-template" >
                                    <div class="sab-item-header">
                                        <h4 style="height:36px !important"></h4>
                                        <button class="sab-btn-remove-item">×</button>
                                    </div>
                                    <div class="sab-item-body">
                                        <div class="sab-item-row">
                                            <div class="sab-item-cell sab-item-cell-left">
                                                <span>Hình ảnh</span>
                                            </div>
                                            <div class="sab-item-cell sab-item-cell-right">
												<div style="height:125px;line-height:125px">
													<img class="display_image_device" src="/images/admin/drag_and_drop.jpg" alt="" style="max-height:110px">
                                                    <input type="file" class="image_device" accept="image/x-png,image/gif,image/jpeg">
                                                    <input type="hidden" class="image_device_current" accept="image/x-png,image/gif,image/jpeg">
                                                    <input type="hidden" class="path_image">
                                                    <input type="hidden" class="base64_image_device">
												</div>
											</div>
                                            <div class="clearfix"></div>
                                        </div>
										<input type="hidden" class="order_image_multi">
										<input type="hidden" class="btn_image_multi">
                                    </div>
                                </li>

                                @foreach($album as $i => $image)
                                <li class="sab-item " data-index="{{$i}}" id="order_{{$i+1}}" >
                                    <div class="sab-item-header">
                                        <h4 style="height:36px !important"></h4>
                                        <button class="sab-btn-remove-item">×</button>
                                    </div>
                                    <div class="sab-item-body">
                                        <div class="sab-item-row">
                                            <div class="sab-item-cell sab-item-cell-left">
                                                <span>Hình ảnh</span>
                                            </div>
                                            <div class="sab-item-cell sab-item-cell-right">
                                                <div style="height:125px;line-height:125px">
                                                    <img class="display_image_device" name="display_image_device_{{$i+1}}"
                                                    id="display_image_device_{{$i+1}}"
                                                    src="{{asset('storage/images/upload/product/'.$image)}}"
                                                    onError="this.onerror=null;this.src='/images/admin/drag_and_drop.jpg';"
                                                    alt="" style="max-height:110px">
                                                    <input type="file" class="image_device" id="image_device_{{$i+1}}" name="image_device_{{$i+1}}" accept="image/x-png,image/gif,image/jpeg" onchange="writefiles(this.files[0],1)" ondrop="drop(event,this.files[0],1)" ondragover="allowDrop(event)">
                                                    <input type="hidden" class="base64_image_device" id="base64_image_device_{{$i+1}}" name="base64_image_device_{{$i+1}}" >
                                                    <input type="hidden" class="image_device_current" id="image_device_current_{{$i+1}}" name="image_device_current_{{$i+1}}" accept="image/x-png,image/gif,image/jpeg" >

                                                    <input type="hidden" class="path_image" id="path_image_{{$i+1}}" name="path_image_{{$i+1}}">
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
										<input type="hidden" class="order_image_multi">
                                        <input type="hidden" class="btn_image_multi">

                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div style="clear: both"></div>
                        <span for="information">Thông tin chi tiết</span>
                        <textarea id="information" name="information" class="js-summernote form-material">{{$product->information}}</textarea>
                        <span for="description">Mô tả sản phẩm</span>
                        <textarea id="description" name="description" class="js-summernote form-material">{{$product->description}}</textarea>
                        <div class="col-md-12">
                            <span class="mb-5">Địa chỉ</span>
                            <div class="row">
                                <div class="form-group mb-5 col-md-3">
                                    <select class="form-control p-0"  onchange="selectProvince()" id="province" required>
                                        @php
                                            $arrAdress = explode(', ',$product->address);
                                        @endphp
                                        @forelse($provinces as $province)
                                            <option value="{{$province->id}}" @if($province->name == $arrAdress[3]) selected @endif>{{$province->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>

                                <div class="form-group mb-5 col-md-3" id="prov">
                                    @forelse($districts as $district)
                                    <option style="display: none"  class="province{{$district->province_id}}" value="{{$district->id}}" @if($district->name == old('district')) selected @endif>{{$district->prefix}} {{$district->name}}</option>
                                    @empty
                                    @endforelse
                                    <select class="form-control p-0"   onchange="selectDistrict()" id="district" required>

                                    </select>
                                </div>

                                <div class="form-group mb-5 col-md-3" id="dis">
                                    @forelse($wards as $ward)
                                    <option style="display: none" class="district{{$ward->district_id}}" value="{{$ward->id}}" @if($ward->name == old('ward')) selected @endif>{{$ward->prefix}} {{$ward->name}}</option>
                                    @empty
                                    @endforelse
                                    <select class="form-control p-0" onchange="setAddress()"  id="ward" required>

                                    </select>
                                </div>
                                <div class="form-group mb-5 col-md-3" id="stre">
                                    <input id="street" type="text"  onchange="setAddress()" class="form-control @error('street') is-invalid @enderror" value="{{old('street')}}" required>
                                    <span class="bar"></span>
                                    <label for="street">Đường</label>
                                    <input type="hidden" name="address" id="address">
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12 mb-5">
                            <p class="mr-2" >Thể loại sản phẩm</p>
                            <div class="row">
                                @foreach ($productCategoryList as $productPropertyItem)
                                    @php
                                        $list = empty($productPropertyItem->properties)?[]:json_decode($productPropertyItem->properties, false, 512, JSON_UNESCAPED_UNICODE);
                                    @endphp
                                    @if ($productPropertyItem->parent_id == 0)
                                        @foreach ($list as $key => $item)
                                            <div style="display: none;" class="col-md-3 proper properties{{$productPropertyItem->id}}" >
                                                <input type="checkbox" {{strpos($product->property_category, $item)!== false ?'checked':''}} id="properties_{{$productPropertyItem->id}}_{{$key}}" name="properties[]" value="{{$item}}" class="material-inputs chk-col-red">
                                                <label for="properties_{{$productPropertyItem->id}}_{{$key}}">{{$item}}</label>
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div id="pro" class="form-group mb-5 focused @error('name') has-error @enderror">
                                <p>Khu vực được giao hàng</p>
                                <div class="input-group w-25 mb-3">
                                    <select class="form-control p-0"  id="ship" required>
                                        @forelse($provinces as $province)
                                            <option value="{{$province->name}}" @if($province->name == old('ship')) selected @endif>{{$province->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-info" onclick="addShip()" type="button">Thêm</button>
                                    </div>
                                </div>

                                <div id="ships" class="row">
                                    @php
                                        $ships = empty($product->listShip)?[]:json_decode($product->listShip, false, 512, JSON_UNESCAPED_UNICODE);
                                    @endphp
                                    @foreach ($ships as $item)
                                    <div class="col-md-2">
                                        <div class="input-group mb-3">
                                            <input type="text" name="ships[]" readonly class="form-control pro" value="{{$item}}" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                            <div class="input-group-append">
                                                <button class="btn btn-info" onclick="removeShip(this)" type="button">Xóa</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-12 mt-5">
                            <p class="mr-2" >Sản phẩm mua cùng</p>
                            <div class="row" id="list">
                               @foreach ($product->productTogethers as $item)
                                    <div  class="col-md-3 product" data-id="{{$item->product_together_id}}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="{{getTitleById($item->product_together_id)}}" name="combo_product_title[]" readonly>
                                            <input type="hidden" name="combo_product_id[]" value="{{$item->product_together_id}}" class="form-control ">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" onclick="removeProduct(this)">Xoá</button>
                                            </div>
                                        </div>
                                    </div>
                               @endforeach
                            </div>
                            <button type="button" class="btn btn-info mt-2" data-toggle="modal" onclick="addProduct()" data-target="#info-header-modal">Thêm sản phẩm</button>
                        </div> --}}
                        <button type="submit" id="save" class="btn btn-success waves-effect waves-light mr-2 mt-5">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <div id="info-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-full-width">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info">
                    <h4 class="modal-title text-white" id="info-header-modalLabel">Modal
                        Heading</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Danh Sách Sản Phẩm</h4>
                                    <input type="hidden" id="index">
                                    <h6 class="card-subtitle">&nbsp;</h6>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered display js-datatable w-100">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                @if(Route::has('product-category.index'))<th>Danh mục sản phẩm</th>@endif
                                                <th>Tên Sản Phẩm</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($productList as $product)
                                                <tr>
                                                    <td>{{$product->id}}</td>
                                                    <td><img src="{{$product->image}}" width="80" /></td>
                                                    @if(Route::has('product-category.index'))<td>{{$product->productCategory->name}}</td>@endif
                                                    <td>{{$product->title}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-info" onclick="chooseProduct({{$product->id}},'{{$product->title}}')" data-id="{{$product->id}}" data-dismiss="modal">Chọn</button>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog --> --}}
    </div>
@endsection

@section('css')
    <style>
        .dropify-message p {
            text-align: center;
        }
        .form-group .note-form-label {
            position: initial;
        }
        .card-header {
            z-index: 0 !important;
        }
    </style>
@endsection

@section('js')
<script>
    let ships = new Array();
    for( let i = 0 ; i < $('.pro').length; i++){
        ships.push($(".pro").eq(i).val());
    }
    function addShip(){
        let val = $("#ship").val();
        if(val != '' && !ships.includes(val)){
            ships.push(val);
            let str = `
            <div class="col-md-2">
                <div class="input-group mb-3">
                    <input type="text" name="ships[]" readOnly class="form-control p-1" value="${val}" placeholder="" aria-label="" aria-describedby="basic-addon1">
                    <div class="input-group-append">
                        <button class="btn btn-info" type="button" onclick="removeShip(this)">Xóa</button>
                    </div>
                </div>
            </div>
            `;
            $("#ships").append(str);
        }
    }
    function removeShip(ele){
        $(ele).parent().parent().parent().remove();
    }
     function changePrice(){
        if(parseInt($("#price").val())<= parseInt($("#sale").val())){
            alert("Giá khuyến mãi phải nhỏ hơn giá gốc!");
            $("#save").attr('disabled','true');
        }else{
            $("#save").removeAttr('disabled');
        }
    }

    function selectCategory(){
        var parent = $('#product_category option:selected').attr('data-parent');
        if(parent == 0 ){
            parent = $("#product_category").val();
        }
        $(".proper").css('display','none');
        $(".properties" + parent).css('display', 'block');
        console.log(".properties" + parent);
    }

    selectCategory();

    function setAddress(){
        let address = $("#street").val() + ', ' + $("#ward option:selected" ).text() + ', '+ $("#district option:selected" ).text()+ ', ' + $("#province option:selected" ).text();
        $("#address").val(address);
    }

    function selectProvince(){
        $("#district").html('');
        list =  $(".province"+$("#province").val());

        for( let i = 0 ; i < list.length ; i++){
            str = `
             <option value='${list.eq(i).attr('value')}'> ${list.eq(i).html()}  </option>
            `
            $("#district").append(str);
        }
        selectDistrict();
    }

    function selectDistrict(){
        $("#ward").html('');
        list =  $(".district"+$("#district").val());

        for( let i = 0 ; i < list.length ; i++){
            str = `
             <option value='${list.eq(i).attr('value')}'> ${list.eq(i).html()}  </option>
            `
            $("#ward").append(str);
        }
        $("#street").val('');
    }
    selectProvince();
    function initAdress(){
        var street = '{{$arrAdress[0]}}';
        var ward = '{{$arrAdress[1]}}';
        var district = '{{$arrAdress[2]}}';
        for(let i = 0 ; i <= $('#district option').length ; i++){
            if($('#district option').eq(i).text().trim() == district.trim()){
                $("#district").val( $('#district option').eq(i).attr('value'));
                break;
            }
        }
        selectDistrict();
        for(let i = 0 ; i <= $('#ward option').length ; i++){
            if($('#ward option').eq(i).text().trim() == ward.trim()){
                $("#ward").val($('#ward option').eq(i).attr('value'));
            }
        }
        $("#street").val(street.trim());
        setAddress();
    }
    initAdress();
    function removeProduct(ele){
        $(ele).parent().parent().parent().remove();
    }
    function chooseProduct(product_id,title){
        let list = document.getElementsByClassName('product');
        let count = 0;
        for(i = 0; i< list.length; i++){
            if(product_id == list[i].getAttribute('data-id')){
                count++;
                alert('Sản phẩm này đã được liên kết');
                return;

            }
        }
        if(count==0){
            let str = ` <div  class="col-md-3 product" data-id="${product_id}">
                        <div class="input-group">
                            <input type="text" class="form-control" value="${title}" name="combo_product_title[]" readonly>
                            <input type="hidden" name="combo_product_id[]" value="${product_id}" class="form-control ">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="removeProduct(this)">Xoá</button>
                            </div>
                        </div>
                    </div> `
            $("#list").append(str);
        }
    }
</script>
<script>
     function removeProduct(ele){
        $(ele).parent().parent().parent().remove();
    }
    function chooseProduct(product_id,title){
        let list = document.getElementsByClassName('product');
        let count = 0;
        for(i = 0; i< list.length; i++){
            if(product_id == list[i].getAttribute('data-id')){
                count++;
                alert('Sản phẩm này đã được liên kết');
                return;

            }
        }
        if(count==0){
            let str = ` <div  class="col-md-3 product" data-id="${product_id}">
                        <div class="input-group">
                            <input type="text" class="form-control" value="${title}" name="combo_product_title[]" readonly>
                            <input type="hidden" name="combo_product_id[]" value="${product_id}" class="form-control ">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="removeProduct(this)">Xoá</button>
                            </div>
                        </div>
                    </div> `
            $("#list").append(str);
        }
    }
     $('#sort_description').summernote({
             toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ],
            height: 300, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
    });
    function sortOder(){

        if($('li.sab-item').length >= 9){
            document.getElementById("group_multi_image_last").style.display = "block";
        }

        $('li.sab-item').each(function(el, i) {
            $(this).attr('id', "order_" + el);
        });

        $('.product_name').each(function(el, i) {
            $(this).attr('id', "product_name_" + el);
            $(this).attr('name', "product_name_" + el);
        });

        $('.introduction').each(function(el, i) {
            $(this).attr('id', "introduction_" + el);
            $(this).attr('name', "introduction_" + el);
        });
        $('.image_device').each(function(el, i) {
            $(this).attr('name', "image_device_" +el);
            $(this).attr('id', "image_device_" + el);
            $(this).attr('onchange', "writefiles(this.files[0]," + el+")");
            $(this).attr('ondrop', "drop(event,this.files[0]," + el+")");
            $(this).attr('ondragover', "allowDrop(event)");
        });

        $('.image_device_current').each(function(el, i) {
            $(this).attr('name', "image_device_current_" +el);
            $(this).attr('id', "image_device_current_" + el);
        });
        $('.base64_image_device').each(function(el, i) {
            $(this).attr('name', "base64_image_device_" +el);
            $(this).attr('id', "base64_image_device_" + el);
        });

        $('.path_image').each(function(el, i) {
            $(this).attr('name', "path_image_" +el);
            $(this).attr('id', "path_image_" + el);
        });

        $('.remove_image').each(function(el, i) {
            $(this).attr('name', "remove_image_" +el);
            $(this).attr('id', "remove_image_" + el);
            $(this).attr('onClick', "removefiles(" + el+")");
        });

        $('.display_image_device').each(function(el, i) {
            $(this).attr('name', "display_image_device_" + el);
            $(this).attr('id', "display_image_device_" + el);
        });
        $('.image_label').each(function(el, i) {
            $(this).attr('for', "image_device_" + el);
        });

        $('.btn_image_multi').each(function(el, i) {
            $(this).attr('id', "btn_image_multi_" + el);
            $(this).attr('name', "btn_image_multi_" + el);
        });

        $('.error_product_name').each(function(el, i) {
            $(this).attr('id', "error_product_name_" + el);
        });
        $('.error_image_device').each(function(el, i) {
            $(this).attr('id', "error_image_device_" + el);
        });

        $('.order_image_multi').each(function(el, i) {
            $(this).attr('id', "order_image_multi_" + el);
            $(this).attr('name', "order_image_multi_" + el);
        });

        $(".image_device").hover(function(){
            $(this).parent().css("opacity", 0.7);
            }, function(){
            $(this).parent().css("opacity", 1);
        });
        $(".display_image_device").hover(function(){
            $(this).parent().css("opacity", 0.7);
            }, function(){
            $(this).parent().css("opacity", 1);
        });


    }
    sortOder();
    $('.sab-btn-remove-item').click(function(event) {
        let index_rm = $(this).closest('.sab-item').attr('data-index');
        var list_rm= $("#list_remove").val();
        list_rm = list_rm + index_rm + ',';
        $("#list_remove").val(list_rm);
        $(this).closest('.sab-item').remove();
        sortOder();
        $('#number_device').val($('li.sab-item').length - 1);
    });
    $('.add-block-electronic').click(function(event) {
        var number_block = $('li.sab-item').length - 1;
        var number_add_block = 3 - (number_block%3);
        for(var i=0; i<number_add_block;i++){
            event.preventDefault();
            var a = $('.sab-item:first-child').clone().removeClass('sab-item-template').appendTo("#sortable");
            sortOder();
            $('#number_device').val($('li.sab-item').length - 1);
            $('.sab-btn-remove-item').click(function(event) {
                $(this).closest('.sab-item').remove();
                sortOder();
                $('#number_device').val($('li.sab-item').length - 1);
            });
        }
    });
</script>
<script type="text/javascript">
    var number_device = $('li.sab-item').length - 1;
    var number_click_add_multi = $('.group_btn_multi_image').length;
    if(document.getElementById("group_btn_multi_image_"+number_click_add_multi)){
        document.getElementById("group_btn_multi_image_"+number_click_add_multi).style.display = "block";
    }
    var filesInput = document.getElementById("input_multi_image_"+number_click_add_multi);

    function handleFiles(data){
        var number_device = $('li.sab-item').length - 1;
        var fileList = data;
        var number_image_seleted = fileList.length;
        var number_load_image;
        var number_multi_upload = 0;
        var start = 1;
        var num_load_img = 0;
        for(var i = 0; i< number_image_seleted; i++)
        {
            for(var h = start; h<=number_device; h++){
                if(document.getElementById("display_image_device_"+h).src.indexOf("drag_and_drop") !== -1){
                    writefiles(fileList[i],h);
                    sortOder();
                    $("#btn_image_multi_"+h).val(number_click_add_multi);
                    $("#order_image_multi_"+h).val(number_multi_upload);
                    number_multi_upload++;
                    start = h+1;
                    num_load_img++;
                    break;
                }
            }
            if(i>=num_load_img){
                // event.preventDefault();
                var a = $('.sab-item:first-child').clone().removeClass('sab-item-template').appendTo("#sortable");
                sortOder();
                $('#number_device').val($('li.sab-item').length - 1);
                $("#btn_image_multi_"+(number_device+i-num_load_img+1)).val(number_click_add_multi);
                $("#order_image_multi_"+(number_device+i-num_load_img+1)).val(number_multi_upload);
                number_multi_upload++;
                $('.sab-btn-remove-item').click(function(event) {
                    $(this).closest('.sab-item').remove();
                    sortOder();
                    $('#number_device').val($('li.sab-item').length - 1);
                });
                writefiles(fileList[i],number_device+i-num_load_img+1);
            }


        }
        document.getElementById("group_btn_multi_image_"+number_click_add_multi).style.display = "none";
        number_click_add_multi = number_click_add_multi + 1;

        $('#btn_multi_image_last').attr('for', "input_multi_image_"+number_click_add_multi);

        var group_number_click_multi = document.createElement("p");
        group_number_click_multi.className = "group_btn_multi_image";
        group_number_click_multi.id = "group_btn_multi_image_"+number_click_add_multi;
        var html_btn_multi = '<label class="hid_error btn btn-success lb_multi_image" for="input_multi_image_'+number_click_add_multi+'" id="btn_multi_image_'+number_click_add_multi+'">Thêm album</label>';
        html_btn_multi += '<input class="hid_error btn_multi_image" onchange="handleFiles(this.files)" id="input_multi_image_'+number_click_add_multi+'" name="multi_img_device_'+number_click_add_multi+'[]" type="file" multiple  accept="image/x-png,image/gif,image/jpeg"/>';
        group_number_click_multi.innerHTML = html_btn_multi;
        document.getElementById("btn").appendChild(group_number_click_multi);

    }
    function writefiles(file,i)
    {
        if(window.FileReader){
            var reader = new FileReader();
            reader.onload = function()
            {
                document.getElementById("display_image_device_"+i).src = reader.result;
                document.getElementById("base64_image_device_"+i).value = reader.result;
            }

            if(file){
                reader.readAsDataURL(file);
            }
        }
    }

    function allowDrop(event) {
        event.preventDefault();
    }

    function drop(event,file,i) {
        event.preventDefault();
        var dt = event.dataTransfer;
        var file_drag = dt.files;
        writefiles(file_drag[0],i);
    }

    function removefiles(i){
        document.getElementById("display_image_device_"+i).src = '../assets/img/drag_and_drop.jpg';
        $("#order_image_multi_"+i).val('');
        $("#btn_image_multi_"+i).val('');
        $("#image_device_"+i).val('');
        $("#image_device_current_"+i).val('');
        $("#base64_image_device_"+i).val('');
        $("#path_image_"+i).val('');
    }

</script>

@endsection

