@extends('admin.layouts.app')

@section('title', 'Thêm Sản Phẩm')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('product.store')}}" class="floating-labels mt-4" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-xl-3">
                                <div class="form-group mb-5">
                                    <input type="file" class="form-control js-dropify" name="file" accept="image/*" data-show-remove="false" required />
                                </div>
                                @if(Route::has('product-category.index'))
                                <div class="form-group mb-5">
                                    <select class="form-control p-0" name="product_category_id" id="product_category" onchange="selectCategory()" required>
                                        @forelse($productCategoryList as $category)
                                            <option value="{{$category->id}}" data-parent="{{$category->parent_id>0?$category->parent_id:$category->id}}" @if($category->id == old('product_category_id')) selected @endif>{{$category->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    <span class="bar"></span>
                                    <label for="category">Danh Mục Sản Phẩm</label>
                                </div>
                                @endif
                                <div class="form-group focused  mb-5 @error('code') has-error @enderror">
                                    <input id="code" type="text" name="code" class="form-control @error('code') is-invalid @enderror" value="{{old('code')}}" required>
                                    <span class="bar"></span>
                                    <label for="code">Mã sản phẩm</label>
                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-5 @error('price') has-error @enderror">
                                    <input id="price" onchange="changePrice()" type="number" min="1000"  name="price" step="1000" class="form-control " value="{{old('price')!=''?old('price'):0}}">
                                    <span class="bar"></span>
                                    <label for="price">Giá gốc</label>
                                </div>
                                <div class="form-group mb-5 @error('sale') has-error @enderror">
                                    <input id="sale" onchange="changePrice()" type="number" min="0"  name="sale" step="1000" class="form-control " value="{{old('sale')!=''?old('sale'):0}}">
                                    <span class="bar"></span>
                                    <label for="sale">Giá khuyến mãi</label>
                                </div>
                                <div class="form-group mb-5 @error('purchase') has-error @enderror">
                                    <input id="purchase" type="number" min="0" pattern="[0-9]*" name="purchase" class="form-control " value="{{old('purchase')!=''?old('purchase'):0}}">
                                    <span class="bar"></span>
                                    <label for="purchase">Lượt mua</label>
                                </div>
                                <div class="form-group mb-5 @error('qty') has-error @enderror">
                                    <input id="qty" type="number" min="0" pattern="[0-9]*" name="qty" class="form-control " value="{{old('qty')!=''?old('qty'):0}}">
                                    <span class="bar"></span>
                                    <label for="qty">Số lượng trong kho</label>
                                </div>
                                <div class="form-group mb-5 @error('status') has-error @enderror">
                                    <p>Trạng thái</p>
                                    <select class="form-control p-0" name="status" id="status" required>
                                        <option value="1" @if(1 == old('status')) selected @endif>Hiển thị</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8 col-xl-9 d-flex ">
                                <div class="card card-body px-0 mb-0">
                                    <div class="form-group focused  mb-5 @error('title') has-error @enderror">
                                        <input id="title" type="text" maxlength="190" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}" required>
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
                                        <textarea id="sort_description" rows="5" class="form-control form-material" name="sort_description" class=" form-material"></textarea>
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
                        <input type="hidden" name="number_device" id="number_device" value="{{$pdt['number_device'] ?? 0}}">
                        <div class="sortable">
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
                            </ul>
                        </div>
                        <div style="clear: both"></div>
                        <span for="information">Thông tin chi tiết</span>
                        <textarea id="information" name="information" class="js-summernote form-material"></textarea>
                        <span for="description">Mô tả sản phẩm</span>
                        <textarea id="description" name="description" class="js-summernote form-material"></textarea>

                        <div class="col-md-12 mb-5">
                            <p class="mr-2" >Loại Bệnh</p>
                            <div class="row">
                                @if(!empty($diseases))
                                    @foreach($diseases as $key => $val)
                                        <div class="col-md-3 proper desease{{$val->id}}" >
                                            <input type="checkbox" id="desease_{{$val->id}}_{{$key}}" name="disease_id[]" value="{{$val->id}}" class="material-inputs chk-col-red">
                                            <label for="desease_{{$val->id}}_{{$key}}">{{$val->name}}</label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <button type="submit" id="save" class="btn btn-success waves-effect waves-light mr-2 mt-5">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
        #sort_description button['aria-label=Picture']{
            display:none;
        }
    </style>
@endsection

@section('js')
<script>
    function changePrice(){
        if(parseInt($("#price").val())<= parseInt($("#sale").val())){
            alert("Giá khuyến mãi phải nhỏ hơn giá gốc!");
            $("#save").attr('disabled','true');
        }else{
            $("#save").removeAttr('disabled');
        }
    }

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
            followingToolbar: false,
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
