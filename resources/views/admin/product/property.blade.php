@extends('admin.layouts.app')

@section('title', 'Sửa sản phẩm')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('admin.product.updateProperty', $product->id)}}" class="floating-labels mt-4 " enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-xl-3">
                                <div class="form-group mb-5">
                                   <img class="img-fluid " src="{{$product->image}}" alt="">
                                </div>
                                @if(Route::has('product-category.index'))
                                
                            </div>
                            <div class="col-sm-12 col-md-8 col-xl-9 d-flex ">
                                <div class="card card-body px-0 mb-0">
                                    <div class="form-group focused mb-5 @error('title') has-error @enderror">
                                        <input id="title" readonly type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title') ?? $product->title}}" required>
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        <span class="bar"></span>
                                        <label for="title">Tên Sản Phẩm</label>
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-5">
                                        <select readonly class="form-control p-0" name="product_category_id" id="category" required>
                                            @forelse($productCategoryList as $category)
                                                <option value="{{$category->id}}" @if($category->id == $product->product_category_id) selected @endif>{{$category->name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        <span class="bar"></span>
                                        <label for="category">Danh Mục Sản Phẩm</label>
                                    </div>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button class="btn btn-success waves-effect waves-light mr-2" type="button" id="btnAddProperty" onclick="addProperty()">Thêm thuộc tính sản phẩm</button>
                            <div class="col-md-12 mt-5" >
                                <div class="row" id="list">
                                    @foreach ($properties as $index_pro=>$property)
                                    <div class="col-md-12 form-group mb-5 product-property " data-index="{{$index_pro}}">
                                        <div class="form-group mb-5 mt-2">
                                            <button class="btn btn-success waves-effect waves-light" type="button" onclick="addValue({{$index_pro}})">Thêm thuộc  Tên sản phẩm</button>
                                        </div> 
                                        <p for="property_name{{$index_pro}}">Tên thuộc tính</p>
                                        <input id="property_name{{$index_pro}}" onchange="checkPropertyName(this)" value="{{$property->property_name}}" type="text" name="property_name[]" required class="form-control property_name">
                                        <p class="err_property_name{{$index_pro}} text-danger hide"> Tên thuộc tính đã tồn tại</p>
                                        <span class="bar"></span>
                                     
                                        <div class="mt-2"  id="list_value{{$index_pro}}">
                                            <ul class="nav nav-tabs">
                                            @foreach ($property->values as $index_value=>$item)
                                                <li class="nav-item " id="li{{$index_pro}}_{{$index_value}}">
                                                <a href="#tab{{$index_pro}}_{{$index_value}}" data-toggle="tab" aria-expanded="true" class="nav-link {{$index_value==0?'active':''}}">
                                                        <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                                        <span class="d-none d-lg-block">Giá trị {{$index_value+1}}  <button type="button" onclick="remove({{$item['id']}},{{$index_pro}},{{$index_value}})" class="ml-1 btn btn-sm btn-warning btn-circle-lg"><i class="fa fa-times"></i>
                                                        </button></span>
                                                       
                                                    </a>
                                                </li>
                                            @endforeach
                                            </ul>
                                            <div class="tab-content">
                                            @foreach ($property->values as $index_value=>$item)
                                                <div class="tab-pane {{$index_value==0?'active':''}}" id="tab{{$index_pro}}_{{$index_value}}">
                                                    <div  class="col-md-12 mt-5 property_{{$index_pro}}" data-index="{{$index_value}}">
                                                        <div class="form-group mb-5">
                                                            <input type="hidden" name="property_id{{$index_pro}}[]" value="{{$item['id']}}">
                                                            <p for="property_value{{$index_pro}}_{{$index_value}}"> Tên sản phẩm</p>
                                                            <input id="property_value{{$index_pro}}_{{$index_value}}" value="{{$item['value']}}"  type="text" onchange="checkValue(this,{{$index_pro}})" name="property_value{{$index_pro}}[]" required class=" value_{{$index_pro}} form-control ">
                                                            <p class="property_value{{$index_pro}}_{{$index_value}}  text-danger hide"> Giá trị đã có trong thuộc tính này</p>
                                                            <span class="bar"></span>
                                                        </div>
                                                        <div class="form-group mb-5">
                                                            <p for="property_sub_value{{$index_pro}}_{{$index_value}}">Giá trị hiển thị</p>
                                                            <input id="property_sub_value{{$index_pro}}_{{$index_value}}" value="{{$item['sub_value']}}" maxlength="21" type="text" name="property_sub_value{{$index_pro}}[]"  class="form-control ">
                                                            <span class="bar"></span>
                                                        </div>
                                                        <div class="form-group mb-5">
                                                            <p for="property_price{{$index_pro}}_{{$index_value}}">Giá tiền</p>
                                                            <input id="property_price{{$index_pro}}_{{$index_value}}" value="{{$item['price']}}" step="1000"  type="number" min="0" pattern="[0-9]*" onchange="checkPrice(this,{{$index_pro}}, {{$index_value}})" name="property_price{{$index_pro}}[]" required class="form-control ">
                                                            <p class="property_price{{$index_pro}}_{{$index_value}}  text-danger hide">Giá tiền không hợp lệ</p>
                                                            <span class="bar"></span>
                                                        </div>
                                                        <div class="form-group mb-5">
                                                            <p for="property_sale{{$index_pro}}_{{$index_value}}">Giá khuyến mãi</p>
                                                            <input id="property_sale{{$index_pro}}_{{$index_value}}" value="{{$item['sale']}}" step="1000"  type="number" min="0" pattern="[0-9]*" onchange="checkSale(this,{{$index_pro}}, {{$index_value}})" name="property_sale{{$index_pro}}[]" required class="form-control ">
                                                            <p class="property_sale{{$index_pro}}_{{$index_value}}  text-danger hide">Giá tiền không hợp lệ</p>
                                                            <span class="bar"></span>
                                                        </div>
                                                        <div class="form-group mb-5">
                                                            <p for="property_qty{{$index_pro}}_{{$index_value}}">Số lượng trong kho</p>
                                                            <input id="property_qty{{$index_pro}}_{{$index_value}}" value="{{$item['qty']}}" step="1"  type="number" min="0" pattern="[0-9]*"  name="property_qty{{$index_pro}}[]" required class="form-control ">
                                                            <p class="property_qty{{$index_pro}}_{{$index_value}}  text-danger hide">Số lượng</p>
                                                            <span class="bar"></span>
                                                        </div>
                                                        {{-- <div class="form-group mb-5">
                                                            <span for="description">Mô tả </span>
                                                            <textarea  rows="5" class="form-control form-material property_description  property_description{{$index_pro}}_{{$index_value}}" name="property_description{{$index_pro}}[]" class=" form-material">{{$item['description']}}</textarea>
                                                       </div>
                                                       <div class="form-group mb-5">
                                                            <input type="hidden" multiple class="form-control  property_file{{$index_pro}}_{{$index_value}}" name="property_file{{$index_pro}}_{{$index_value}}[]" accept="image/*" data-show-remove="false"  data-default-file="{{$item['image']}}"/>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success waves-effect waves-light ">Lưu</button>
                            </div>
                        </div>
                    </form>
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
        .hide{
            display: none;
        }
        .show{
            display: block;
        }
        .error{
            color:red;
        }
        .product-property{
            border: 1px solid #DEDEDE;
        }
    </style>
@endsection

@section('js')

<script>
    $(document).ready(function(){
        let list_pro = document.getElementsByClassName('product-property');
        if(list_pro.length>0){
            $("#btnAddProperty").attr('disabled','true');
        }
    })
    function remove(property_id, index_pro, index_value){
        $("#li"+index_pro+"_"+index_value).remove();
        $("#tab"+index_pro+"_"+index_value).remove();
        if(property_id>0){
            let input = `<input name="list_remove[]" value="${property_id}" type="hidden"/>`;
            $("#list").append(input);
        }
    }
     $('.property_description').summernote({
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
    function checkPropertyName(ele){
        let list = document.getElementsByClassName('property_name');
        let value = $(ele).val();
        let id = $(ele).attr('id');
        let count = 0;
        for(i=0; i<list.length; i++){
            if(list[i].value == value){
                count++;
            }
        }

        if(count > 1){
            $(".err_"+id).removeClass('hide');
            $(".err_"+id).addClass('show');
            $(ele).focus();
            $('button[type="submit"]').attr('disabled','true');
        }else{
            $(".err_"+id).removeClass('show');
            $(".err_"+id).addClass('hide');
            $('button[type="submit"]').removeAttr('disabled');
        }
       
    }
    function checkValue(ele, index_pro){
        let list = document.getElementsByClassName('value_'+index_pro);
        let value = $(ele).val();
        let id = $(ele).attr('id');
        let count = 0;
        for(i=0; i<list.length; i++){
            if(list[i].value == value){
                count++;
            }
        }

        if(count > 1){
            $("."+id).removeClass('hide');
            $("."+id).addClass('show');
            $(ele).focus();
            $('button[type="submit"]').attr('disabled','true');
        }else{
            $("."+id).removeClass('show');
            $("."+id).addClass('hide');
            $('button[type="submit"]').removeAttr('disabled');
        }
       
    }
    function chooseProduct(product_id,title){
        $("#property_product_title"+ $("#index").val()).val(title);
        $("#property_product_id"+ $("#index").val()).val(product_id);
    }
    function getMaxValue(arr){
        let max = -1;
        for(i = 0; i< arr.length?arr.length:0; i++){
            let val = arr[i].getAttribute('data-index');
            if(parseInt(val)>max){
                max = val;
            }
        }
        return parseInt(max);
    }
    
    function addProperty(){
        $("#btnAddProperty").attr('disabled','true');
        let list_pro = document.getElementsByClassName('product-property');
        let index_pro = getMaxValue(list_pro);
        index_pro+=1;
        let str = ` <div class="col-md-6 form-group mb-5 product-property " data-index="${index_pro}">
                        <div class="form-group mb-5 mt-2">
                            <button class="btn btn-success waves-effect waves-light" type="button" onclick="addValue(${index_pro})">Thêm thuộc  Tên sản phẩm</button>
                        </div> 
                        <p for="property_name${index_pro}">Tên thuộc tính</p>
                        <input id="property_name${index_pro}" onchange="checkPropertyName(this)" type="text" name="property_name[]" required class="form-control property_name">
                        <p class="err_property_name${index_pro} text-danger hide"> Tên thuộc tính đã tồn tại</p>
                        <span class="bar"></span>
                        <div class="mt-2" id="list_value${index_pro}">
                            <ul class="nav nav-tabs">
                                <li class="nav-item" id="li${index_pro}_0">
                                    <a href="#tab${index_pro}_0" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                        <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                        <span class="d-none d-lg-block">Giá trị 1
                                            <button type="button" onclick="remove(0,${index_pro},0})" class="ml-1 btn btn-sm btn-warning btn-circle-lg"><i class="fa fa-times"></i>
                                            </button>    
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab${index_pro}_0">
                                    <div  class="col-md-12 mt-5 property_${index_pro}" data-index="0">
                                        <div class="form-group mb-5">
                                            <input type="hidden" name="property_id${index_pro}[]" value="0"/>
                                            <p for="property_value${index_pro}_0"> Tên sản phẩm</p>
                                            <input id="property_value${index_pro}_0"  type="text" onchange="checkValue(this,${index_pro})" name="property_value${index_pro}[]" required class=" value_${index_pro} form-control ">
                                            <p class="property_value${index_pro}_0  text-danger hide"> Giá trị đã có trong thuộc tính này</p>
                                            <span class="bar"></span>
                                        </div>
                                        <div class="form-group mb-5">
                                            <p for="property_sub_value${index_pro}_0">Giá trị hiển thị</p>
                                            <input id="property_sub_value${index_pro}_0" value="" maxlength="21"  type="text" name="property_sub_value${index_pro}[]"  class="form-control ">
                                            <span class="bar"></span>
                                        </div>
                                        <div class="form-group mb-5">
                                            <p for="property_price${index_pro}_0">Giá tiền</p>
                                            <input id="property_price${index_pro}_0" value="0" step="1000"  type="number" min="0" pattern="[0-9]*" onchange="checkPrice(this,${index_pro},0)" name="property_price${index_pro}[]" required class="form-control ">
                                            <p class="property_price${index_pro}_0  text-danger hide">Giá tiền không hợp lệ</p>
                                            <span class="bar"></span>
                                        </div>
                                        <div class="form-group mb-5">
                                            <p for="property_sale${index_pro}_0">Giá khuyến mãi</p>
                                            <input id="property_sale${index_pro}_0" value="0" step="1000"  type="number" min="0" pattern="[0-9]*" onchange="checkSale(this,${index_pro},0)" name="property_sale${index_pro}[]" required class="form-control ">
                                            <p class="property_sale${index_pro}_0  text-danger hide">Giá tiền không hợp lệ</p>
                                            <span class="bar"></span>
                                        </div>
                                        <div class="form-group mb-5">
                                            <p for="property_qty${index_pro}_0">Số lượng trong kho</p>
                                            <input id="property_qty${index_pro}_0" value="0" step="1"  type="number" min="0" pattern="[0-9]*"  name="property_qty${index_pro}[]" required class="form-control ">
                                            <p class="property_qty${index_pro}_0  text-danger hide">Số lượng không hợp lệ</p>
                                            <span class="bar"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                   `;
        $("#list").append(str);
    }
    function addProduct(index_pro,index_value){
        $("#index").val(index_pro+"_"+index_value);
    }
    
    function checkPrice(ele, index_pro, index_value){
        if(parseInt($(`#property_price${index_pro}_${index_value}`).val()) < $(`#property_sale${index_pro}_${index_value}`).val()){
            alert('Giá khuyến mãi phải nhỏ hơn giá gốc');
            $('button[type="submit"]').attr('disabled',true);
        }else{
            $('button[type="submit"]').removeAttr('disabled');
        }
    }
    function checkSale(ele, index_pro, index_value){
        if(parseInt($(`#property_price${index_pro}_${index_value}`).val()) < $(`#property_sale${index_pro}_${index_value}`).val()){
            alert('Giá khuyến mãi phải nhỏ hơn giá gốc');
            $('button[type="submit"]').attr('disabled',true);
        }else{
            $('button[type="submit"]').removeAttr('disabled');
        }
    }
    function addValue(index_pro){
        $("#list_value"+index_pro+" .nav-link").removeClass('active');
        $("#list_value"+index_pro+" .tab-pane").removeClass('active');
        let list_value = document.getElementsByClassName('property_'+index_pro);
        let index_value = getMaxValue(list_value);
        index_value+=1;
        let li = `
            <li class="nav-item" id="li${index_pro}_${index_value}">
                <a href="#tab${index_pro}_${index_value}" data-toggle="tab" aria-expanded="true" class="nav-link active">
                    <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                    <span class="d-none d-lg-block">Giá trị ${index_value+1}
                        <button type="button" onclick="remove(0,${index_pro},${index_value})" class="ml-1 btn btn-sm btn-warning btn-circle-lg"><i class="fa fa-times"></i>
                        </button>
                    </span>
                </a>
            </li>
        `;
        let str = `  
        <div class="tab-pane active" id="tab${index_pro}_${index_value}">
            <div  class="col-md-12 mt-5 property_${index_pro}" data-index="${index_value}">
                <div class="form-group mb-5">
                    <p for="property_value${index_pro}_${index_value}"> Tên sản phẩm</p>
                    <input id="property_value${index_pro}_${index_value}" type="text" onchange="checkValue(this,${index_pro})"  name="property_value${index_pro}[]" required class="value_${index_pro} form-control ">
                    <p class="property_value${index_pro}_${index_value} text-danger hide"> Giá trị đã có trong thuộc tính này</p>
                    <span class="bar"></span>
                    
                </div>
                <div class="form-group mb-5">
                    <input type="hidden" name="property_id${index_pro}[]" value="0"/>
                    <p for="property_sub_value${index_pro}_${index_value}">Giá trị hiển thị</p>
                    <input id="property_sub_value${index_pro}_${index_value}" value="" maxlength="21"  type="text" name="property_sub_value${index_pro}[]"  class="form-control ">
                    <span class="bar"></span>
                </div>
                <div class="form-group mb-5">
                    <p for="property_price${index_pro}_${index_value}">Giá tiền</p>
                    <input id="property_price${index_pro}_${index_value}" value="0" step="1000"  type="number" min="0" pattern="[0-9]*" onchange="checkPrice(this,${index_pro},${index_value})" name="property_price${index_pro}[]" required class="form-control ">
                    <p class="property_price${index_pro}_${index_value}  text-danger hide">Giá tiền không hợp lệ</p>
                    <span class="bar"></span>
                </div>
                <div class="form-group mb-5">
                    <p for="property_sale${index_pro}_${index_value}">Giá khuyến mãi</p>
                    <input id="property_sale${index_pro}_${index_value}" value="0" step="1000"  type="number" min="0" pattern="[0-9]*" onchange="checkSale(this,${index_pro},${index_value})" name="property_sale${index_pro}[]" required class="form-control ">
                    <p class="property_sale${index_pro}_${index_value}  text-danger hide">Giá tiền không hợp lệ</p>
                    <span class="bar"></span>
                </div>
                <div class="form-group mb-5">
                    <p for="property_qty${index_pro}_${index_value}">Số lượng trong kho</p>
                    <input id="property_qty${index_pro}_${index_value}" value="0" step="1"  type="number" min="0" pattern="[0-9]*"  name="property_qty${index_pro}[]" required class="form-control ">
                    <p class="property_qty${index_pro}_${index_value}  text-danger hide">Số lượng không hợp lệ</p>
                    <span class="bar"></span>
                </div>
            </div>
        </div>`;
        $('#list_value'+index_pro+ ' .nav-tabs').append(li);
        $('#list_value'+index_pro+ ' .tab-content').append(str);
    }
    

</script>

@endsection

