@extends('admin.layouts.app')

@section('title', __('Contact'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">@lang('Contact')</h4>
                    <form method="POST" action="{{route('configuration.store')}}" class="floating-labels mt-4">
                        @csrf
                        <x-input name="phone" value="{{$config->phone}}" label="Phone Number" />
                        <x-input name="email" value="{{$config->email}}" type="email" label="E-Mail Address" required />
                        <x-input name="whatsapp" value="{{$config->whatsapp}}" label="WhatsApp" />
                        <x-input name="zalo" value="{{$config->zalo}}" label="Zalo" />
                        <x-input name="messenger" value="{{$config->messenger}}" label="Messenger" />
                        <button type="submit" class="btn btn-success waves-effect waves-light mr-2">@lang('Save')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
