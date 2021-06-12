@extends('admin.layouts.app')

@section('title', __('Slide'))

@section('content')
    @include('admin.slide.' . (isset($slide) ? 'edit' : 'create'))
    <div class="row">
        <div class="col-12">
            <div class="row draggable-cards js-dragula">
                @forelse($slideList as $slide)
                    <div class="col-12 js-order" id="{{$slide->id}}">
                        <div class="card mb-1">
                            <div class="card-body p-2">
                                <div class="row">
                                    <div class="col-sm-3 mb-2 mb-sm-0">
                                        <img @src="{{$slide->src}}" width="80">
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="row">
                                            <div class="col-12">{{$slide->name}}</div>
                                            <div class="col-12">@lang('Time'):
                                                <code>{{$slide->time}} @lang('second')</code>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 d-flex flex-column justify-content-center align-items-center">
                                        <x-action route="slide" id="{{$slide->id}}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .dropify-wrapper {
            height: 150px;
        }

        #content {
            resize: none;
        }
    </style>
@endsection

@section('js')
    <script>
        $(function () {
            dragula([document.querySelector(".js-dragula")]).on("out", function (e, t) {
                t.className = t.className.replace("card-over", "");
                let formData = new FormData();
                formData.append('_token', '{{csrf_token()}}');
                $('.js-order').each(function (index) {
                    formData.append($(this).attr('id'), index);
                });
                fetch('/admin/slide/order', {method: 'POST', body: formData})
                    .then(response => response.text())
                    .then(data => {
                        toastr.info(data, $('meta[name=title]').attr("content"), {timeOut: 2000});
                    });
            })
        });
    </script>
@endsection
