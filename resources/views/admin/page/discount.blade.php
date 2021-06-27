@extends('admin.layouts.app')

@section('title', __('Khuyến Mãi'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('page.save-page-product') }}" class="floating-labels mt-4" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-xl-12">
                                <div class="form-group mb-5">
                                    <select class="form-control p-0" name="page[1][name]" id="name" required>
                                        <option value="discount">Khuyễn Mãi</option>
                                    </select>
                                    <span class="bar"></span>
                                    <label for="name">Khuyễn Mãi</label>
                                </div>
                                <x-summernote name="page[1][content]" value="{{ isset($page[0]) ? $page[0]->content : '' }}" label="Content" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success waves-effect waves-light mr-2">@lang('Save')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
