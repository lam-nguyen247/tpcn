@extends('admin.layouts.app')

@section('title', __('My Profile'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">@lang('Edit Profile')</h4>
                    <form method="POST" action="{{route('profile.update', $user->id)}}" class="floating-labels mt-4">
                        @csrf
                        @method('PUT')
                        <x-input name="name" value="{{$user->name}}" label="Name" required />
                        <x-input name="email" value="{{$user->email}}" type="email" label="E-Mail Address" required />
                        <button type="submit" class="btn btn-success waves-effect waves-light mr-2">@lang('Save')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
