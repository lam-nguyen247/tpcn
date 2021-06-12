<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-actions">
                    <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                </div>
                <h4 class="card-title mb-0">@lang('Edit')</h4>
            </div>
            <div class="card-body pb-0 collapse show table-responsive no-wrap">
                <form method="POST" action="{{route('slide.update', $slide->id)}}" class="floating-labels mt-1"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                            <x-dropify name="file" class="mb-4" value="{{$slide->image}}" />
                        </div>
                        <div class="col-sm-6 col-md-7 col-lg-8 col-xl-9">
                            <div class="row">
                                <div class="col-lg-7">
                                    <x-input name="name" value="{{$slide->name}}" label="Title" class="mb-4" input-class="form-control-sm" />
                                </div>
                                <div class="col-sm-5 col-lg-2">
                                    <x-input name="order" value="{{$slide->order}}" type="number" label="Order" class="mb-4" input-class="form-control-sm" />
                                </div>
                                <div class="col-sm-7 col-lg-3">
                                    <x-input name="time" value="{{$slide->time}}" type="number" label="Time" class="mb-4" input-class="form-control-sm" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <x-input name="url" value="{{$slide->url}}" label="Link" class="mb-4" input-class="form-control-sm" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-10">
                                    <x-textarea name="content" value="{{$slide->content}}" label="Content" class="" input-class="form-control-sm" />
                                </div>
                                <div class="col-lg-2 mb-3 mb-lg-0 d-flex flex-column justify-content-center">
                                    <button type="submit" class="btn text-center btn-success waves-effect waves-light">@lang('Save')</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
