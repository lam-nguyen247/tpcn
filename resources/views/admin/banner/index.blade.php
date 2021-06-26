@extends('admin.layouts.app')

@section('title', __('Banner'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('banner.store') }}" class="floating-labels mt-4" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-8 col-md-8 col-xl-8 ">
                                <h4 class="card-title">Banner trang chủ</h4>
                                <div class="form-group mb-5">
                                    <input type="hidden" name="banner[1][name]"  class="form-control " value="banner_home">
                                </div>
                                <div class="form-group mb-sm-4">
                                    <p>Hình ảnh ( kích thước 586x545)</p>
                                    <input type="hidden" name="banner[1][image]" value="{{ isset($banners[0]->image) ? $banners[0]->image : '' }}">
                                    <input type="file" class="form-control js-dropify" name="banner[1][file]" accept="image/*" data-default-file="{{ !is_null($banners[0]->image) ? url($banners[0]->image) : '' }}" data-show-remove="false" />
                                </div>

                                <h4 class="card-title">Banner Blog</h4>
                                <div class="form-group mb-5">
                                    <input type="hidden" name="banner[2][name]"  class="form-control " value="banner_blog">
                                </div>
                                <div class="form-group mb-sm-4">
                                    <p>Hình ảnh ( kích thước 586x545)</p>
                                    <input type="hidden" name="banner[2][image]" value="{{ isset($banners[1]->image) ? $banners[1]->image : '' }}">
                                    <input type="file" class="form-control js-dropify" name="banner[2][file]" accept="image/*" data-default-file="{{ !is_null($banners[1]->image) ? url($banners[1]->image) : '' }}" data-show-remove="false" />
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-4 col-xl-4">
                                <h4 class="card-title">Banner bên phải</h4>
                                <div class="form-group mb-5">
                                    <input type="hidden" name="banner[3][name]"  class="form-control " value="banner_left">
                                </div>
                                <div class="form-group mb-sm-4">
                                    <p>Hình ảnh ( kích thước 480x264)</p>
                                    <input type="hidden" name="banner[3][image]" value="{{ isset($banners[2]->image) ? $banners[2]->image : '' }}">
                                    <input type="file" class="form-control js-dropify" name="banner[3][file]" accept="image/*" data-default-file="{{ !is_null($banners[2]->image) ? url($banners[2]->image) : '' }}" data-show-remove="false" />
                                </div>
                                <div class="form-group mb-5">
                                    <h4 class="card-title">Banner bên phải</h4>
                                    <div class="form-group mb-5">
                                        <input type="hidden" name="banner[4][name]"  class="form-control " value="banner_left2">
                                    </div>
                                    <div class="form-group mb-sm-4">
                                        <p>Hình ảnh ( kích thước 480x264)</p>
                                        <input type="hidden" name="banner[4][image]" value="{{ isset($banners[3]->image) ? $banners[3]->image : '' }}">
                                        <input type="file" class="form-control js-dropify" name="banner[4][file]" accept="image/*" data-default-file="{{ !is_null($banners[3]->image) ? url($banners[3]->image) : '' }}" data-show-remove="false" />
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
