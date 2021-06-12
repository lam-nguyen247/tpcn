@extends('admin.layouts.app')

@section('title', __('Social Network'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">@lang('Social Network')</h4>
                    <form method="POST" action="{{route('configuration.store')}}" class="floating-labels mt-4">
                        @csrf
                        <x-input name="facebook" value="{{$config->facebook}}" label="Facebook" />
                        <x-input name="instagram" value="{{$config->instagram}}" label="Instagram" />
                        <x-input name="twitter" value="{{$config->twitter}}" label="Twitter" />
                        <x-input name="youtube" value="{{$config->youtube}}" label="Youtube" />
                        <button type="submit" class="btn btn-success waves-effect waves-light mr-2">@lang('Save')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
