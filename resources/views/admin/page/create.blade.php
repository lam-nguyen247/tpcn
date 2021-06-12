@extends('admin.layouts.app')

@section('title', __('New Page'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('page.store')}}" class="floating-labels mt-4" enctype="multipart/form-data">
                        @csrf
                        <x-input name="name" label="Title" required />
                        <x-summernote name="content" label="Content" />
                        @createseo
                        <button type="submit" class="btn btn-success waves-effect waves-light mr-2">@lang('Save')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
