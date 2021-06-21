@extends('admin.layouts.app')

@section('title', __('Banner'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/admin/slide/updateAll" class="floating-labels mt-4" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-8 col-md-8 col-xl-8 ">
                                <div class="form-group mb-5 @error('price') has-error @enderror">
                                    <input id="price" type="text" name="banner[1]name"  class="form-control " value="">
                                    <span class="bar"></span>
                                    <label for="name1">Tên banner</label>
                                </div>
                                <div class="form-group mb-sm-4">
                                    <p>Hình ảnh ( kích thước 586x545)</p>
                                    <input type="file" class="form-control js-dropify" name="file1" accept="image/*" data-default-file="" data-show-remove="false" />
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-xl-4">
                                <div class="form-group mb-5 @error('price') has-error @enderror">
                                    <input id="price" type="text" name="name2"  class="form-control " value="">
                                    <span class="bar"></span>
                                    <label for="name2">Tên banner</label>
                                </div>
                                <div class="form-group mb-sm-4">
                                    <p>Hình ảnh ( kích thước 480x264)</p>
                                    <input type="hidden" name="id" value="">
                                    <input type="file" class="form-control js-dropify" name="file2" accept="image/*" data-default-file="" data-show-remove="false" />
                                </div>
                                <div class="form-group mb-5 @error('price') has-error @enderror">
                                    <div class="form-group mb-5 @error('price') has-error @enderror">
                                        <input id="price" type="text" name="name3"  class="form-control " value="">
                                        <span class="bar"></span>
                                        <label for="name3">Tên banner</label>
                                    </div>
                                    <div class="form-group mb-sm-4">
                                        <p>Hình ảnh ( kích thước 480x264)</p>
                                        <input type="hidden" name="id" value="">
                                        <input type="file" class="form-control js-dropify" name="file3" accept="image/*" data-default-file="" data-show-remove="false" />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-success waves-effect waves-light mr-2">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
