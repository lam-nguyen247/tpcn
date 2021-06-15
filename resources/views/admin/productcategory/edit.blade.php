<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Sửa Danh Mục</h4>
                <h6>&nbsp;</h6>
                <form method="POST" enctype="multipart/form-data" action="{{route('product-category.update', $productCategory->id)}}" class="floating-labels mt-4">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-5">
                        <select class="form-control p-0" name="display_home" id="display_home" required>
                            <option value="1" @if(1 == $productCategory->display_home) selected @endif>Hiển thị</option>
                            <option value="0" @if(0 == $productCategory->display_home) selected @endif>Không hiển thị</option>
                        </select>
                        <span class="bar"></span>
                        <label for="category">Hiển Thị Trên Trang Chủ</label>
                    </div>
                    <div class="form-group mb-5 focused @error('name') has-error @enderror">
                        <input type="hidden" name='id' value="{{old('id') ?? $productCategory->id}}">
                        <input id="name" type="text" name="name" value="{{old('name') ?? $productCategory->name}}"
                               class="form-control @error('name') is-invalid @enderror" required>
                        <span class="bar"></span>
                        <label for="name">Tên Danh Mục Sản Phẩm</label>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <select class="form-control p-0" name="parent_id" id="parent_id" required>
                            <option value="0" @if(0 == $productCategory->parent_id) selected @endif>Không</option>
                            @forelse ($productCategoryList as $item)
                                @if ($item->parent_id==0 && $item->id != $productCategory->id)
                                    <option value="{{$item->id}}" @if($item->id == $productCategory->parent_id) selected @endif>{{$item->name}}</option>
                                @endif
                            @empty

                            @endforelse
                        </select>
                        <span class="bar"></span>
                        <label for="category">Danh mục cha</label>
                    </div>
                    <div id="pro" class="form-group mb-5 focused @error('name') has-error @enderror">
                        <div class="input-group w-50 mb-3">
                            <input type="text" id="property" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-info" onclick="addProperty()" type="button">Thêm</button>
                            </div>
                        </div>
                        <span class="bar"></span>
                        <label for="property">Thuộc tính danh mục</label>
                        <div id="properties" class="row">
                            @php
                                $properties = empty($productCategory->properties)?[]:json_decode($productCategory->properties, false, 512, JSON_UNESCAPED_UNICODE);
                            @endphp
                            @if(!empty($properties))
                                @foreach ($properties as $item)
                                <div class="col-md-2">
                                    <div class="input-group mb-3">
                                        <input type="text" name="properties[]" class="form-control pro" value="{{$item}}" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                        <div class="input-group-append">
                                            <button class="btn btn-info" onclick="removeProperty(this)" type="button">Xóa</button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-5">
                                <span>Ảnh icon</span>
                                <div class="form-group mb-sm-4">
                                    <input type="file" class="form-control js-dropify" id="image" name="image"  data-default-file="{{$productCategory->image}}" accept="image/*" data-show-remove="false"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group mb-5">
                                <span>Ảnh bìa trang chủ</span>
                                <input type="file" class="form-control js-dropify" id="banner" name="banner" data-default-file="{{$productCategory->banner}}" accept="image/*" data-show-remove="false"/>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect waves-light mr-2">Sửa</button>
                </form>
            </div>
        </div>
    </div>
</div>
