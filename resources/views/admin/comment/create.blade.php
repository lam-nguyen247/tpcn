@extends('admin.layouts.app')

@section('title', 'Thêm bình luận')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('comment.store')}}" class="floating-labels mt-4" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-md-8 col-xl-9 d-flex align-items-center mb-2">
                                <div class="card card-body px-0 mb-0">
                                    <div class="form-group focused @error('name') has-error @enderror">
                                        <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" required>
                                        <span class="bar"></span>
                                        <label for="name">Họ và tên</label>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8 col-xl-9 d-flex align-items-center mb-2">
                                <div class="card card-body px-0 mb-0">
                                    <div class="form-group focused @error('name') has-error @enderror">
                                        <p class="mr-2" >Sản phẩm </p>
                                        <div class="input-group mb-3">
                                            <input type="text" id="product_name"   class="form-control" required="required" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                            <input type="hidden" name="product_id" required id="product_id">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-info" data-toggle="modal"  data-target="#info-header-modal">Chọn sản phẩm</button>  
                                            </div>
                                        </div>
                                        @error('product_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8 col-xl-9 d-flex align-items-center mb-2">
                                <div class="card card-body px-0 mb-0">
                                    <div class="form-group focused @error('phone') has-error @enderror">
                                        <input id="phone" type="tel" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Định dạng số điện thoại không đúng.' : '');"  pattern="(0{1})([0-9]{1})([0-9]{8})" name="phone" value="{{ old('phone') ?? ''}}"
                                        class="form-control @error('phone') is-invalid @enderror">
                                        <span class="bar"></span>
                                        <label for="phone">Số điện thoại</label>
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8 col-xl-9 d-flex align-items-center mb-2">
                                <div class="card card-body px-0 mb-0">
                                    <div class="form-group focused @error('email') has-error @enderror">
                                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" required>
                                        <span class="bar"></span>
                                        <label for="email">Email</label>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8 col-xl-9 d-flex align-items-center mb-2">
                                <div class="card card-body px-0 mb-0">
                                    <b for="content">Nội dung</b>
                                    <div class="form-group focused @error('content') has-error @enderror">
                                        <textarea required name="content" id="content" class="form-control" rows="5"></textarea>
                                        @error('content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8 col-xl-9 d-flex align-items-center mb-2">
                                <div class="card card-body px-0 mb-0">
                                    <b for="reply">Trả lời</b>
                                    <div class="form-group focused @error('reply') has-error @enderror">
                                        <textarea name="reply" id="reply" class="form-control"  rows="5"></textarea>
                                        @error('reply')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8 col-xl-9 d-flex align-items-center mb-2">
                                <div class="card card-body px-0 mb-0">
                                    <p for="name">Điểm đánh giá</p>
                                    <div class="form-group focused @error('name') has-error @enderror">
                                        <select class="form-control p-1"  name="score" id="score">
                                            <option value="5">5*</i></option>
                                            <option value="4">4*</i></option>
                                            <option value="3">3*</i></option>
                                            <option value="2">2*</i></option>
                                            <option value="1">1*</i></option>
                                        </select>
                                        @error('name')
                                        <span  class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8 col-xl-9 d-flex align-items-center mb-2">
                                <div class="card card-body px-0 mb-0">
                                    <p for="name">Trạng thái</p>
                                    <div class="form-group focused @error('name') has-error @enderror">
                                        <select class="form-control p-1"  name="status" id="status">
                                            <option style="color:red" value="1">Hiện</option>
                                            <option style="color:blue" value="0">Ẩn</option>
                                        </select>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <button type="submit" class="btn btn-success waves-effect waves-light mr-2">@lang('Save')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

     <div id="info-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-modal="true">
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
        </div><!-- /.modal-dialog -->
@endsection
@section('js')
    <script>
        function chooseProduct(id, title){
            $("#product_name").val(title);
            $("#product_id").val(id);
        }
    </script>
@endsection
