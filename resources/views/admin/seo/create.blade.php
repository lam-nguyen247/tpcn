@if(Route::has('seo.index'))
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-actions">
                    <a class="" data-action="collapse"><i class="ti-plus"></i></a>
                </div>
                <h4 class="card-title mb-0">@lang('Seo')</h4>
            </div>
            <div class="card-body pt-5 table-responsive no-wrap collapse">
                <x-input name="title" label="Title" />
                <x-textarea name="description" label="Description" />
                <x-input name="robots" label="Robots" class="no" />
            </div>
        </div>
    </div>
</div>
@endif
