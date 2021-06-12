@extends('admin.layouts.app')

@section('title', __('All Posts'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-sm btn-outline-success float-right" href="{{ route('post.create') }}">
                        <i class="fas fa-plus-circle"></i> @lang('Add New')</a>
                    <h4 class="card-title mb-4">@lang('All Posts')</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered display js-datatable w-100">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                @if(Route::has('category.index'))<th>@lang('Categories')</th>@endif
                                <th>@lang('Title')</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($postList as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td><img @src="{{$post->image}}" width="80" /></td>
                                    @if(Route::has('category.index'))<td>{{$post->category->first()->name}}</td>@endif
                                    <td>{{$post->name}}</td>
                                    <td><x-action route="post" id="{{$post->id}}" /></td>
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
@endsection
