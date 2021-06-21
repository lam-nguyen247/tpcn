<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm Danh Mục</h4>
                <h6>&nbsp;</h6>
                <form method="POST" action="{{route('product-category.store')}}" class="floating-labels mt-4" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-5">
                        <select class="form-control p-0" name="display_home" id="display_home" required>
                            <option value="1" @if(1 == old('display_home')) selected @endif>Hiển thị</option>
                            <option value="0" @if(0 == old('display_home')) selected @endif>Không hiển thị</option>
                        </select>
                        <span class="bar"></span>
                        <label for="category">Hiển Thị Trên Trang Chủ</label>
                    </div>
                    <div class="form-group mb-5 focused @error('name') has-error @enderror">
                        <input id="name" type="text" name="name" value="{{old('name')}}"
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
                        <select onchange="isParent()" class="form-control p-0" name="parent_id" id="parent_id" required>
                            <option value="0" @if(0 == old('parent_id')) selected @endif>Không</option>
                            @forelse ($productCategoryList as $item)
                                @if ($item->parent_id==0)
                                    <option value="{{$item->id}}" @if($item->id == old('parent_id')) selected @endif>{{$item->name}}</option>
                                @endif
                            @empty

                            @endforelse
                        </select>
                        <span class="bar"></span>
                        <label for="category">Danh mục cha</label>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-5">
                                <span>Ảnh icon</span>
                                <div class="form-group mb-sm-4">
                                    <input type="file" class="form-control js-dropify" id="image" name="image" accept="image/*" data-show-remove="false"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group mb-5">
                                <span>Ảnh bìa trang chủ</span>
                                <input type="file" class="form-control js-dropify" id="banner" name="banner" accept="image/*" data-show-remove="false"/>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect waves-light mr-2">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</div>
