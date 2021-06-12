@extends('admin.layouts.app')

@section('title', __('Content Management System'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">@lang('Content Management System')</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered display js-datatable w-100">
                            <thead>
                            <tr>
                                <th></th>
                                <th>@lang('Content')</th>
                                <th>@lang('Last modified date')</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($cmsList as $cms)
                            <tr>
                                <td>{{$cms->id}}</td>
                                <td>
                                    @if(Str::startsWith($cms->content, config('constants.folder.cms')))
                                        <img @src="{{$cms->src}}" width="80">
                                    @else
                                        {{$cms->excerpt}}
                                    @endif
                                </td>
                                <td>{{$cms->updated_at}}</td>
                                <td><x-action route="cms" id="{{$cms->id}}" disabled-edit /></td>
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
