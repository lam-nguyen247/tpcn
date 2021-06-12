@extends('admin.layouts.app')

@section('title', __('Website'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">@lang('Website')</h4>
                    <form method="POST" action="{{route('configuration.store')}}" class="floating-labels mt-4">
                        @csrf
                        @php
                            $languageList = json_decode(json_encode([['id' => 'vi', 'name' => __('Vietnamese')], ['id' => 'en', 'name' => __('English')]]));
                            $themeList = json_decode(json_encode([['id' => 'light', 'name' => __('Light')], ['id' => 'dark', 'name' => __('Dark')]]));
                        @endphp
                        <x-select name="locale" value="{{$config->locale}}" label="Language" required :option-list="$languageList" />
                        <x-select name="theme" value="{{$config->theme}}" label="Theme" required :option-list="$themeList" />
                        <x-textarea name="css" rows="7" value="{{$config->css}}" label="Style" />
                        <x-textarea name="js" rows="7" value="{{$config->js}}" label="Javascript" />
                        <button type="submit" class="btn btn-success waves-effect waves-light mr-2">@lang('Save')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
