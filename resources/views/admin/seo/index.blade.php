@extends('admin.layouts.app')

@section('title', __('All Seo'))

@section('content')
    @include('admin.seo.' . (isset($seo) ? 'edit' : 'create'))
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">@lang('All Seo')</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered display js-datatable w-100">
                            <thead>
                            <tr>
                                <th></th>
                                <th>@lang('Title')</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($seoList as $seo)
                            <tr>
                                <td>{{$seo->id}}</td>
                                <td>{{$seo->name}}</td>
                                <td><x-action route="seo" id="{{$seo->id}}" /></td>
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
