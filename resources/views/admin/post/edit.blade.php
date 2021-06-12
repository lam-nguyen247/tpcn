@extends('admin.layouts.app')

@section('title', __('Edit Post'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('post.update', $post->id)}}" class="floating-labels mt-4" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{$post->id}}">
                        <input type="hidden" name="language" value="{{app()->getLocale()}}" />
                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-xl-3">
                                <x-dropify name="file" value="{{$post->image}}" class="mb-sm-4" />
                            </div>
                            <div class="col-sm-12 col-md-8 col-xl-9 d-flex align-items-center mb-2">
                                <div class="card card-body px-0 mb-0">
                                    @if(Route::has('category.index'))
                                    <x-select name="category_id" value="{{$post->category->first()->id}}" label="Categories" :option-list="$categoryList" required />
                                    @endif
                                    <x-input name="name" value="{{$post->name}}" label="Title" class="no" required />
                                </div>
                            </div>
                        </div>
                        <x-summernote name="content" value="{{$post->content}}" label="Content" />
                        @editseo
                        <button type="submit" class="btn btn-success waves-effect waves-light mr-2">@lang('Save')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
