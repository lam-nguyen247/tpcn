@extends('admin.layouts.app')

@section('title', __('All Pages'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-sm btn-outline-success float-right" href="{{ route('page.create') }}">
                        <i class="fas fa-plus-circle"></i> @lang('Add New')</a>
                    <h4 class="card-title mb-4">@lang('All Pages')</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered display js-datatable w-100">
                            <thead>
                            <tr>
                                <th></th>
                                <th>@lang('Title')</th>
                                <th>@lang('URL')</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($pageList as $page)
                                <tr>
                                    <td>{{$page->id}}</td>
                                    <td>{{$page->name}}</td>
                                    <td>{{$page->slug}}</td>
                                    <td><x-action route="page" id="{{$page->id}}" /></td>
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
