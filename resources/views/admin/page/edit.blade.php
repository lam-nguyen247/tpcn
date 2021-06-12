@extends('admin.layouts.app')

@section('title', __('Edit Page'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('page.update', $page->id)}}" class="floating-labels mt-4" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{$page->id}}">
                        <x-input name="name" value="{{$page->name}}" label="Title" required />
                        <x-summernote name="content" value="{{$page->content}}" label="Content" />
                        @editseo
                        <button type="submit" class="btn btn-success waves-effect waves-light mr-2">@lang('Save')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
