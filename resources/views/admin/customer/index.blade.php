@extends('admin.layouts.app')

@section('title', __('Customer'))

@section('content')
    @includeWhen(isset($customer), 'admin.customer.edit')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">@lang('Customer List')</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered display js-datatable w-100">
                            <thead>
                            <tr>
                                <th></th>
                                <th>@lang('Domain')</th>
                                <th>@lang('Theme')</th>
                                <th>@lang('Language')</th>
                                <th>@lang('Company')</th>
                                <th>@lang('Name')</th>
                                <th>@lang('Phone number')</th>
                                <th>@lang('E-Mail Address')</th>
                                <th>@lang('Address')</th>
                                <th>@lang('Content')</th>
                                <th>@lang('Creation date')</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($customerList as $customer)
                                <tr>
                                    <td>{{$customer->id}}</td>
                                    <td>{{$customer->domain}}</td>
                                    <td>{{$customer->theme}}</td>
                                    <td>{{$customer->language}}</td>
                                    <td>{{$customer->company}}</td>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->phone}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->address}}</td>
                                    <td>{{$customer->content}}</td>
                                    <td>{{$customer->created_at}}</td>
                                    <td><x-action route="customer" id="{{$customer->id}}" /></td>
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
