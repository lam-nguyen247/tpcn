@extends('admin.layouts.app')

@section('title', __('Edit Page'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('page.save-page-product') }}" class="floating-labels mt-4" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-xl-6">
                                <div class="form-group mb-5">
                                    <select class="form-control p-0" name="page[1][name]" id="name" required>
                                        <option value="cam-ket">Cam Kết</option>
                                    </select>
                                    <span class="bar"></span>
                                    <label for="name">Thanh toán & cam kết</label>
                                </div>
                                <x-summernote name="page[1][content]" value="{{ isset($page[0]) ? $page[0]->content : '' }}" label="Content" />
                            </div>

                            <div class="col-sm-6 col-md-6 col-xl-6">
                                <div class="form-group mb-5">
                                    <select class="form-control p-0" name="page[2][name]" id="name" required>
                                        <option value="giao-hang">Giao Hàng - Thanh Toán</option>
                                    </select>
                                    <span class="bar"></span>
                                    <label for="name">Thanh toán & cam kết</label>
                                </div>
                                <x-summernote name="page[2][content]" value="{{ isset($page[1]) ? $page[1]->content : '' }}" label="Content" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success waves-effect waves-light mr-2">@lang('Save')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
