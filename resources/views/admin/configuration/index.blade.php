@extends('admin.layouts.app')

@section('title', __('Setting'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">@lang('Setting')</h4>
                    <h6>&nbsp;</h6>
                    <form method="POST" action="{{route('configuration.store')}}" class="floating-labels mt-4">
                        @csrf
                        <x-input name="phone_number" value="{{$configuration['phone_number'] ?? ''}}" type="number" label="Phone Number" />
                        <x-input name="phone_text" value="{{$configuration['phone_text'] ?? ''}}" label="Formatting Phone Number" />
                        <x-input name="email" value="{{$configuration['email'] ?? ''}}" type="email" label="E-Mail Address" />
                        <button type="submit" class="btn btn-success waves-effect waves-light mr-2">@lang('Save')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
